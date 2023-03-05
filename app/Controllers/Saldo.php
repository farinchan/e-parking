<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SaldoModel;

class Saldo extends BaseController
{
    protected $Saldo;
    public function __construct()
    {
        $this->Saldo = new SaldoModel();
    }
    public function index()
    {
        // $Saldo = $this->Saldo->findAll();
        $data = [
            "active" => "transaksi",
            "saldo" => $this->Saldo->relasi(),
        ];

        return view("v_saldo", $data);
    }
}
