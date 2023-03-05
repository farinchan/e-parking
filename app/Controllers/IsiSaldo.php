<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IsiSaldoModel;
use App\Models\SaldoModel;

class IsiSaldo extends BaseController
{
    protected $Saldo, $isiSaldo;
    public function __construct()
    {
        $this->Saldo = new SaldoModel();
        $this->isiSaldo = new IsiSaldoModel();
    }
    public function index()
    {
        $data = [
            "active" => "transaksi",
            "isisaldo" => $this->isiSaldo->relasi(),
        ];

        return view("v_isi_saldo", $data);
    }
    public function card()
    {
        $rfid = $_POST['rfid'];
        $data = [
            "active" => "transaksi",
            "isisaldo" => $this->Saldo->relasiSearch($rfid),
        ];

        return view("v_isi_saldo_detail", $data);
    }
}
