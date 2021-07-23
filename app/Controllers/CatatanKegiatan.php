<?php

namespace App\Controllers;

use App\Models\TotalKaloriHarianModel as totalKaloriHarianModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use DateTime;

class CatatanKegiatan extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\CatatanKegiatanModel';

    public function __construct()
    {
        $this->totalKaloriHarianModel = new totalKaloriHarianModel();
    }

    public function getCatKegiatan()
    {
        return $this->respond($this->model->getCatKegiatan(), 200);
    }

    public function getDetailCatKegiatan($id)
    {
        return $this->respond($this->model->getDetailCatKegiatan($id), 200);
    }

    public function insertCatKegiatan()
    {
        $inputNama = $this->request->getPost('nama');
        $inputKalori = $this->request->getPost('kalori');
        $data = [
            'durasi'   => $this->request->getPost('durasi'),
            'nama'   => $inputNama,
            'kalori' => $inputKalori,
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        $this->model->insertCatKegiatan($data);

        $data2 = [
            'nama'   => $inputNama,
            'kalori' => $inputKalori,
            'jenis'  => "kegiatan",
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];
        $this->totalKaloriHarianModel->insertKalori($data2);
    }

    public function updateCatKegiatan($id)
    {
        $data = [
            'id'     => $id,
            'durasi'   => $this->request->getPost('durasi'),
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori'),
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        return $this->model->insertCatKegiatan($data);
    }

    public function deleteCatKegiatan($id)
    {
        return $this->model->deleteCatKegiatan($id);
    }
}
