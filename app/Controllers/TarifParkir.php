<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TarifParkirModel;

class TarifParkir extends BaseController
{
    protected $Tarif;
    public function __construct()
    {
        $this->Tarif = new TarifParkirModel();
    }
    public function index()
    {
        $Tarif = $this->Tarif->findAll();
        $data = [
            "active" => "transaksi",
            "tarif" => $Tarif
        ];
        return view("v_Tarif", $data);
    }
}
