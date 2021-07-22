<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use DateTime;

class CatatanCemilan extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\CatatanCemilanModel';

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
        $data = [
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori'),
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        return $this->model->insertCemilan($data);
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
}
