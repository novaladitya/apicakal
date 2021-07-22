<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class DaftarKegiatan extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\DaftarKegiatanModel';

    public function getKegiatan()
    {
        return $this->respond($this->model->getKegiatan(), 200);
    }

    public function getDetailKegiatan($id)
    {
        return $this->respond($this->model->getDetailKegiatan($id), 200);
    }

    public function insertKegiatan()
    {
        $data = [
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori')
        ];

        return $this->model->insertKegiatan($data);
    }

    public function updateKegiatan($id)
    {
        $data = [
            'id'     => $id,
            'nama'   => $this->request->getPost('nama'),
            'kalori' => $this->request->getPost('kalori')
        ];

        return $this->model->insertKegiatan($data);
    }

    public function deleteKegiatan($id)
    {
        return $this->model->deleteKegiatan($id);
    }
}
