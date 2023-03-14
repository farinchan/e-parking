<?php

namespace App\Models;

use CodeIgniter\Model;

class ParkirModel extends Model
{
    protected $table = 'parkir';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['id', 'rfid', 'id_tempat', 'jam_masuk', "jam_keluar", "status"];

    public function relasi()
    {
        $query = $this->db->table('parkir')
            ->join('user', 'parkir.rfid=user.rfid')
            ->join('lokasi_parkir', 'parkir.id_tempat=lokasi_parkir.id_tempat')
            ->get()->getResultArray();

        return $query;
    }
}
