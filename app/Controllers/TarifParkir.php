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

    public function add()
    {
        $this->Tarif->save([
            "tarif_nama" => $this->request->getVar("nama"),
            "tarif_nilai" => $this->request->getVar("harga"),
            "tarif_slot" => $this->request->getVar("slot"),
            "tarif_status" => $this->request->getVar("status"),

        ]);
        return redirect()->to('/tarifparkir');
    }
    public function edit($id)
    {
        $this->Tarif->update($id, [
            "tarif_nama" => $this->request->getVar("nama"),
            "tarif_nilai" => $this->request->getVar("harga"),
            "tarif_slot" => $this->request->getVar("slot"),
            "tarif_status" => $this->request->getVar("status"),

        ]);
        return redirect()->to('/tarifparkir');
    }
    public function delete($id)
    {
        $this->Tarif->delete($id);
        return redirect()->to('/tarifparkir');
    }
}
