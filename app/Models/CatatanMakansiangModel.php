<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanMakansiangModel extends Model
{
    protected $table = 'catatan_sarapan';
    protected $allowedFields = [
        'porsi',
        'nama',
        'kalori',
        'tanggal'
    ];

    public function getMakansiang()
    {
        return $this->findAll();
    }

    public function getDetailMakansiang($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    public function insertMakansiang($data)
    {
        return $this->save($data);
    }

    public function deleteMakansiang($id)
    {
        return $this->delete($id);
    }

    public function getTotalKkalSiang()
    {
        return $this->db->query("SELECT SUM(kalori) AS 'total_kalori' FROM $this->table")->getRow();
    }
}
