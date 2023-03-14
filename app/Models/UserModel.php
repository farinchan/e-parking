<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['rfid', 'user_nama', 'user_email', 'user_password', 'user_phone', 'user_token', 'user_status', 'user_created_at'];
}
