<?php

namespace App\Models;

use CodeIgniter\Model;

class TotalKaloriHarianModel extends Model
{
    protected $table = 'total_kaloriharian';
    protected $allowedFields = [
        'nama',
        'kalori',
        'jenis',
        'tanggal'
    ];

    public function getKaloriMakanan()
    {
        return $this->db->query("SELECT SUM(kalori) AS 'total_kalorimakanan' FROM $this->table WHERE jenis='makanan'")->getRow();
    }

    public function getKaloriKegiatan()
    {
        return $this->db->query("SELECT SUM(kalori) AS 'total_kalorikegiatan' FROM $this->table WHERE jenis='kegiatan'")->getRow();
    }

    public function getTotalKaloriHarian()
    {
        return $this->db->query("SELECT SUM(kalori) AS 'total_kaloriharian' FROM $this->table")->getRow();
    }

    public function getSelisihKalori()
    {
        return $this->db->query("SELECT ((SELECT SUM(kalori) AS 'total_kaloriharian' FROM total_kaloriharian WHERE jenis='makanan') - (SELECT SUM(kalori) AS 'total_kaloriharian' FROM total_kaloriharian WHERE jenis='kegiatan')) AS 'selisih_kalori'")->getRow();
    }

    public function insertKalori($data)
    {
        return $this->save($data);
    }

    public function deleteKalori($nama)
    {
        return $this->delete($nama);
    }
}
