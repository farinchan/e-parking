<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LokasiParkirModel;

class LokasiParkir extends BaseController
{
    protected $LokasiParkir;
    public function __construct()
    {
        $this->LokasiParkir = new LokasiParkirModel();
    }
    public function index()
    {
        $LokasiParkir = $this->LokasiParkir->findAll();
        $data = [
            "active" => "monitoring",
            "lokasiParkir" => $LokasiParkir
        ];
        return view("v_lokasi_parkir", $data);
    }
}
