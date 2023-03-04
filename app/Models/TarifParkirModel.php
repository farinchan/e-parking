<?php

namespace App\Models;

use CodeIgniter\Model;

class TarifParkirModel extends Model
{
    protected $table = 'tarif_parkir';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'tarif_nama', 'tarif_nilai', 'tarif_slot', 'tarif_status'];
}
