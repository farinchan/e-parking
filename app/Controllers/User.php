<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use Exception;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

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

    public function newUser()
    {
        $this->User->save([
            "rfid" => $this->request->getVar("rfid"),
            "user_nama" => $this->request->getVar("nama"),
            "user_email" => $this->request->getVar("email"),
            "user_password" => password_hash("12345678", PASSWORD_DEFAULT),
            "user_phone" => $this->request->getVar("phone"),
            "user_token" => $this->request->getVar("token"),
        ]);
        return redirect()->to("/user");
    }


    //ini untuk mobile user
    public function login()
    {

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->User->where('user_email', $email)->first();

        if (is_null($user)) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }

        $pwd_verify = password_verify($password, $user['user_password']);

        if (!$pwd_verify) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }

        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        // $exp = $iat + 3600;

        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat, //Time the JWT issued at
            // "exp" => $exp, // Expiration time of token
            "email" => $user['user_email'],
            "rfid" => $user['rfid'],
        );

        $token = JWT::encode($payload, $key, 'HS256');

        $response = [
            'message' => 'Login Succesful',
            'token' => $token
        ];

        return $this->respond($response, 200);
    }

    public function profile()
    {
        $key = getenv('JWT_SECRET');
        $header = $this->request->getHeader("Authorization");
        $token = null;

        // extract the token from the header
        if (!empty($header)) {
            if (preg_match('/Bearer\s(\S+)/', $header, $matches)) {
                $token = $matches[1];
            }
        }
        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        $data = [
            "status" => "success",
            "data" => $this->User->where("rfid",  $decoded->rfid)->first(),
            "jwt_info" => $decoded
        ];


        return $this->respond($data, 200);
    }
    public function profileEdit()
    {
        $key = getenv('JWT_SECRET');
        $header = $this->request->getHeader("Authorization");
        $token = null;

        // extract the token from the header
        if (!empty($header)) {
            if (preg_match('/Bearer\s(\S+)/', $header, $matches)) {
                $token = $matches[1];
            }
        }
        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        $this->User->where("user_email",  $decoded->email)->update([
            "rfid" => $this->request->getVar("rfid"),
            "user_nama" => $this->request->getVar("nama"),
            "user_email" => $this->request->getVar("email"),
            "user_password" => password_hash("12345678", PASSWORD_DEFAULT),
            "user_phone" => $this->request->getVar("phone"),
            "user_token" => $this->request->getVar("token"),
        ]);

        return $this->respond(["message" => "Success"], 200);
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
