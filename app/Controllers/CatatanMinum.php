<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use DateTime;

class CatatanMinum extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\CatatanMinumModel';

    public function getTotalMinum()
    {
        return $this->respond($this->model->getTotalMinum(), 200);
    }

    public function insertMinum()
    {
        $data = [
            'porsi'   => $this->request->getPost('porsi'),
            'tanggal' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ];

        return $this->model->insertMinum($data);
    }
}
