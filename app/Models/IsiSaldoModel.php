<?php

namespace App\Models;

use CodeIgniter\Model;

class IsiSaldoModel extends Model
{
    protected $table = 'isi_saldo';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'rfid', 'isi_saldo_tanggal', 'isi_saldo_jumlah'];

    public function relasi()
    {
        $query = $this->db->table('isi_saldo')
            ->join('user', 'isi_saldo.rfid=user.rfid')
            ->get()->getResultArray();

        return $query;
    }
}
