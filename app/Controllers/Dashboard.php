<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ParkirModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{

    public function index()
    {
        $user = new UserModel();
        $admin = new AdminModel();
        $logsParkir = new ParkirModel();
        $lokasiParkir = new LokasiParkir();

        $data = [
            "active" => "dashboard",
            "logsParkir" => $logsParkir->relasi(),
            "user" => $user->countAllResults(),
            "admin" => $admin->countAllResults(),
            // "lokasiParkirPenuh" => $lokasiParkir->countAllResults()

        ];

        // dd($data);
        return view('v_dashboard', $data);
    }
}
