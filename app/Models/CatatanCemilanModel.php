<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanCemilanModel extends Model
{
    protected $table = 'catatan_cemilan';
    protected $allowedFields = [
        'porsi',
        'nama',
        'kalori',
        'tanggal'
    ];

    public function getCemilan()
    {
        return $this->findAll();
    }

    public function getDetailCemilan($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    public function insertCemilan($data)
    {
        return $this->save($data);
    }

    public function deleteCemilan($id)
    {
        return $this->delete($id);
    }
}
