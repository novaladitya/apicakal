<?php

namespace App\Controllers;

use App\Models\TotalKaloriHarianModel as totalKaloriHarianModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use DateTime;

class CatatanMakanmalam extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\CatatanMakanmalamModel';

    public function __construct()
    {
        $this->totalKaloriHarianModel = new totalKaloriHarianModel();
    }

    public function getMakanmalam()
    {
        return $this->respond($this->model->getMakanmalam(), 200);
    }

    public function getDetailMakanmalam($id)
    {
        return $this->respond($this->model->getDetailMakanmalam($id), 200);
    }

    public function insertMakanmalam()
    {
        $inputNama = $this->request->getPost('nama');
        $inputKalori = $this->request->getPost('kalori');
        $data = [
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $inputNama,
            'kalori' => $inputKalori,
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        $this->model->insertMakanmalam($data);

        $data2 = [
            'nama'   => $inputNama,
            'kalori' => $inputKalori,
            'jenis'  => "makanan",
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];
        $this->totalKaloriHarianModel->insertKalori($data2);
    }

    public function updateMakanmalam($id)
    {
        $data = [
            'id'     => $id,
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori'),
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        return $this->model->insertMakanmalam($data);
    }

    public function deleteMakanmalam($id)
    {
        return $this->model->deleteMakanmalam($id);
    }

    public function getTotalKkalMalam()
    {
        return $this->respond($this->model->getTotalKkalMalam(), 200);
    }
}
