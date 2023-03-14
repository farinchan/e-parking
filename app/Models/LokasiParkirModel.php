<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiParkirModel extends Model
{
    protected $table = 'lokasi_parkir';
    protected $primaryKey    = 'id_tempat';
    protected $allowedFields = ['id_tempat', 'latitude', 'longtitude', 'active', "status"];
}
