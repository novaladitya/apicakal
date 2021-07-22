<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use DateTime;

class CatatanSarapan extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\CatatanSarapanModel';

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
        $data = [
            'porsi'   => $this->request->getPost('porsi'),
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori'),
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        return $this->model->insertSarapan($data);
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
}
