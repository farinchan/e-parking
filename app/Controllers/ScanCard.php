<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TempRfidModel;

class ScanCard extends BaseController
{
    
    public function index()
    {
        $Card = new TempRfidModel();
        $data = array(
            'rfid' => $Card->first()["rfid"]
        );
        echo json_encode($data);
    }

    public function clearcard()
    {
        $Card = new TempRfidModel();
        if ($Card->countAll() != 0) {
            $Card->truncate();
        }
        $data = [
            "message" => "success"
        ];
        echo json_encode($data);
    }
}
