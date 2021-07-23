<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanMinumModel extends Model
{
    protected $table = 'catatan_minum';
    protected $allowedFields = [
        'porsi',
        'tanggal'
    ];

    public function insertMinum($data)
    {
        return $this->save($data);
    }

    public function getTotalMinum()
    {
        return $this->db->query("SELECT SUM(porsi) AS 'total_minum' FROM $this->table")->getRow();
    }
}
