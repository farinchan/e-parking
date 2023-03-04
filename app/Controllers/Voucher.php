<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VoucherModel;

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
}
