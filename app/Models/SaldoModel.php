<?php

namespace App\Models;

use CodeIgniter\Model;

class SaldoModel extends Model
{
    protected $table = 'saldo';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'rfid', 'saldo_sisa', 'saldo_terpakai'];

    public function relasi()
    {
        $query = $this->db->table('saldo')
            ->join('user', 'saldo.rfid=user.rfid')
            ->get()->getResultArray();

        return $query;
    }
    public function relasiSearch($uid)
    {
        $query = $this->db->table('saldo')->where("saldo.rfid", $uid)
            ->join('user', 'saldo.rfid=user.rfid')
            ->get()->getResultArray();

        return $query;
    }
}
