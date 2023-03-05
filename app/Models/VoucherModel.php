<?php

namespace App\Models;

use CodeIgniter\Model;

class VoucherModel extends Model
{
    protected $table = 'voucher';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'voucher_nomor', 'voucher_nominal', 'voucher_expired', 'voucher_status'];
}
