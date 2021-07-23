<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanMakanmalamModel extends Model
{
    protected $table = 'catatan_makanmalam';
    protected $allowedFields = [
        'porsi',
        'nama',
        'kalori',
        'tanggal'
    ];

    public function getMakanmalam()
    {
        return $this->findAll();
    }

    public function getDetailMakanmalam($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    public function insertMakanmalam($data)
    {
        return $this->save($data);
    }

    public function deleteMakanmalam($id)
    {
        return $this->delete($id);
    }

    public function getTotalKkalMalam()
    {
        return $this->db->query("SELECT SUM(kalori) AS 'total_kalori' FROM $this->table")->getRow();
    }
}
