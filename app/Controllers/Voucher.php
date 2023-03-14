<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\SaldoModel;
use App\Models\VoucherModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


helper('text');

class Voucher extends BaseController
{
    use ResponseTrait;
    protected $Voucher, $saldo;
    public function __construct()
    {
        $this->Voucher = new VoucherModel();
        $this->saldo = new SaldoModel();
    }
    public function index()
    {
        $Voucher = $this->Voucher->findAll();
        $data = [
            "active" => "transaksi",
            "voucher" => $Voucher
        ];
        return view("v_voucher", $data);
    }
    public function generate()
    {
        $random_string = random_string('alnum', 10);
        $data = array('string' => $random_string);
        echo json_encode($data);
    }

    public function add()
    {
        $date = date('Y-m-d'); // tanggal hari ini
        $nextMonth = date('Y-m-d', strtotime('+1 month', strtotime($date))); // tanggal bulan depan
        $this->Voucher->save([
            "voucher_nomor" => $this->request->getVar("nomor"),
            "voucher_nominal" => $this->request->getVar("nominal"),
            "voucher_expired" => $nextMonth,
            "voucher_status" => 0,
        ]);

        return redirect()->to("/voucher");
    }
    public function edit($id)
    {
        $this->Voucher->update($id, [
            "voucher_nomor" => $this->request->getVar("nomor"),
            "voucher_nominal" => $this->request->getVar("nominal"),
            "voucher_expired" =>  $this->request->getVar("expired"),
            "voucher_status" =>  $this->request->getVar("status"),
        ]);

        return redirect()->to("/voucher");
    }
    public function delete($id)
    {
        $this->Voucher->delete($id);
        return redirect()->to("/voucher");
    }

    public function reedeem()
    {
        $key = getenv('JWT_SECRET');
        $header = $this->request->getHeader("Authorization");
        $token = null;

        // extract the token from the header
        if (!empty($header)) {
            if (preg_match('/Bearer\s(\S+)/', $header, $matches)) {
                $token = $matches[1];
            }
        }
        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        $no = $this->request->getVar("nomor");
        $res = $this->Voucher->where("voucher_nomor",  $no)->first();
        if (is_null($res)) {
            //VOUCHER TIDAK ADA
            $data = [
                "status" => "failed",
                "message" => "Voucher Tidak ditemukan"
            ];
            return $this->respond($data, 200);
        } else {
            if ($res["voucher_status"] == 0) {
                //Voucher Belum Diguanakan
                $this->Voucher->update(
                    $res["id"],
                    [
                        "voucher_status" => 1
                    ]
                );
                $nominal = $res["voucher_nominal"];
                $dataUser = $this->saldo->where("rfid", $decoded->rfid);
                $saldoSisa = $dataUser->first()["saldo_sisa"];
                $result = $saldoSisa + $nominal;

                $this->saldo->update($decoded->rfid, ["saldo_sisa" => $result]);

                $data = [
                    "status" => "ok",
                    "message" => "success",
                    "saldo" => $dataUser
                ];

                return $this->respond($data, 200);
            } else {
                //Voucher sudah digunakan
                $data = [
                    "status" => "failed",
                    "message" => "Voucher Sudah Digunakan"
                ];
                return $this->respond($data, 200);
            }
        }

        return $this->respond($res, 200);
    }
}
