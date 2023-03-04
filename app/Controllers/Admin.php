<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $Admin;
    public function __construct()
    {
        $this->Admin = new AdminModel();
    }
    public function index()
    {
        $Admin = $this->Admin->findAll();
        $data = [
            "active" => "admin",
            "admin" => $Admin
        ];
        return view("v_admin", $data);
    }
}
