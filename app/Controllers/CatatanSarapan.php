<?php

namespace App\Controllers;

use App\Models\TotalKaloriHarianModel as totalKaloriHarianModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use DateTime;

class CatatanSarapan extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\CatatanSarapanModel';

    public function __construct()
    {
        $this->totalKaloriHarianModel = new totalKaloriHarianModel();
    }

    public function getSarapan()
    {
        return $this->respond($this->model->getSarapan(), 200);
    }

    public function getDetailSarapan($id)
    {
        return $this->respond($this->model->getDetailSarapan($id), 200);
    }

    public function insertSarapan()
    {
        $inputNama = $this->request->getPost('nama');
        $inputKalori = $this->request->getPost('kalori');

        $data = [
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $inputNama,
            'kalori' => $inputKalori,
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];
        $this->model->insertSarapan($data);

        $data2 = [
            'nama'   => $inputNama,
            'kalori' => $inputKalori,
            'jenis'  => "makanan",
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];
        $this->totalKaloriHarianModel->insertKalori($data2);
    }

    public function updateSarapan($id)
    {
        $data = [
            'id'     => $id,
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori'),
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        return $this->model->insertSarapan($data);
    }

    public function deleteSarapan($id)
    {
        return $this->model->deleteSarapan($id);
    }

    public function getTotalKkalSarapan()
    {
        return $this->respond($this->model->getTotalKkalSarapan(), 200);
    }
}
