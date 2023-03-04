<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['admin_name', 'admin_email', 'admin_password', 'admin_level', 'admin_status', 'admin_created_at'];
}
