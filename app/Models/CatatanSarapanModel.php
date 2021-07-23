<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanSarapanModel extends Model
{
    protected $table = 'catatan_sarapan';
    protected $allowedFields = [
        'porsi',
        'nama',
        'kalori',
        'tanggal'
    ];

    public function getSarapan()
    {
        return $this->findAll();
    }

    public function getDetailSarapan($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    public function insertSarapan($data)
    {
        return $this->save($data);
    }

    public function deleteSarapan($id)
    {
        return $this->delete($id);
    }

    public function getTotalKkalSarapan()
    {
        return $this->db->query("SELECT SUM(kalori) AS 'total_kalori' FROM $this->table")->getRow();
    }
}
