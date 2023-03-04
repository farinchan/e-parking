<?php

namespace App\Models;

use CodeIgniter\Model;

class TempRfidModel extends Model
{
    protected $table = 'temp_rfid';
    protected $allowedFields = ['rfid'];
}
