<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VoucherModel;

helper('text');

class Voucher extends BaseController
{

    protected $Voucher;
    public function __construct()
    {
        $this->Voucher = new VoucherModel();
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
}
