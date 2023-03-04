<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\TempRfidModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class User extends BaseController
{
    use ResponseTrait;
    protected $User;
    public function __construct()
    {
        $this->User = new UserModel();
    }
    public function index()
    {
        $User = $this->User->findAll();
        $data = [
            "active" => "user",
            "user" => $User
        ];
        return view("v_user", $data);
    }

    public function card()
    {
        $Card = new TempRfidModel();
        if ($Card->countAll() != 0) {
            # code...
            $data = [
                "message" => "success",
                "rfid" => $Card->first()["rfid"]
            ];
        } else {
            $data = [
                "message" => "success",
                "result" => "null"
            ];
        }
        return $this->respond($data, 200);
    }

    public function scanCard()
    {
        $Card = new TempRfidModel();
        if ($Card->countAll() != 0) {
            $Card->truncate();
        }
        $Card->save([
            'rfid' => $this->request->getVar('rfid'),
        ]);
        $data = [
            "message" => "success"
        ];
        return $this->respond($data, 200);
    }
    public function cardDelete()
    {
        $Card = new TempRfidModel();
        if ($Card->countAll() != 0) {
            $Card->truncate();
        }
        $data = [
            "message" => "success"
        ];
        return $this->respond($data, 200);
    }
}

function slugify($text, string $divider = '-')
{
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, $divider);
    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);
    // lowercase
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}
