<?php

namespace App\Controllers;

use App\Models\TotalKaloriHarianModel as totalKaloriHarianModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use DateTime;

class CatatanCemilan extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\CatatanCemilanModel';

    public function __construct()
    {
        $this->totalKaloriHarianModel = new totalKaloriHarianModel();
    }

    public function getCemilan()
    {
        return $this->respond($this->model->getCemilan(), 200);
    }

    public function getDetailCemilan($id)
    {
        return $this->respond($this->model->getDetailCemilan($id), 200);
    }

    public function insertCemilan()
    {
        $inputNama = $this->request->getPost('nama');
        $inputKalori = $this->request->getPost('kalori');
        $data = [
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $inputNama,
            'kalori' => $inputKalori,
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        $this->model->insertCemilan($data);

        $data2 = [
            'nama'   => $inputNama,
            'kalori' => $inputKalori,
            'jenis'  => "makanan",
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];
        $this->totalKaloriHarianModel->insertKalori($data2);
    }

    public function updateCemilan($id)
    {
        $data = [
            'id'     => $id,
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori'),
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        return $this->model->insertCemilan($data);
    }

    public function deleteCemilan($id)
    {
        return $this->model->deleteCemilan($id);
    }

    public function getTotalKkalCemilan()
    {
        return $this->respond($this->model->getTotalKkalCemilan(), 200);
    }
}
