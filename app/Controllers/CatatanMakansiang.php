<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use DateTime;

class CatatanMakansiang extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\CatatanMakansiangModel';

    public function getMakansiang()
    {
        return $this->respond($this->model->getMakansiang(), 200);
    }

    public function getDetailMakansiang($id)
    {
        return $this->respond($this->model->getDetailMakansiang($id), 200);
    }

    public function insertMakansiang()
    {
        $data = [
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori'),
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        return $this->model->insertMakansiang($data);
    }

    public function updateMakansiang($id)
    {
        $data = [
            'id'     => $id,
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori'),
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        return $this->model->insertMakansiang($data);
    }

    public function deleteMakansiang($id)
    {
        return $this->model->deleteMakansiang($id);
    }
}
