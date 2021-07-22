<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanKegiatanModel extends Model
{
    protected $table = 'catatan_kegiatan';
    protected $allowedFields = [
        'durasi',
        'nama',
        'kalori',
        'tanggal'
    ];

    public function getCatKegiatan()
    {
        return $this->findAll();
    }

    public function getDetailCatKegiatan($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    public function insertCatKegiatan($data)
    {
        return $this->save($data);
    }

    public function deleteCatKegiatan($id)
    {
        return $this->delete($id);
    }
}
