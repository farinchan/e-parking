<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ParkirModel;

class Parkir extends BaseController
{
    protected $Parkir;
    public function __construct()
    {
        $this->Parkir = new ParkirModel();
    }
    public function index()
    {
        $Parkir = $this->Parkir->findAll();
        $data = [
            "active" => "monitoring",
            "riwayatParkir" => $Parkir
        ];
        return view("v_riwayat_parkir", $data);
    }
}
