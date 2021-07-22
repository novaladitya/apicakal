<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use DateTime;

class CatatanMakanmalam extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\CatatanMakanmalamModel';

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
        $data = [
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori'),
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        return $this->model->insertMakanmalam($data);
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
}
