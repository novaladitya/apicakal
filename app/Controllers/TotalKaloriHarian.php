<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;
use DateTime;

class TOtalKaloriHarian extends ResourceController
{
    protected $format         = 'json';
    protected $modelName      = 'App\Models\TotalKaloriHarianModel';

    public function getKaloriMakanan()
    {
        return $this->respond($this->model->getKaloriMakanan(), 200);
    }

    public function getKaloriKegiatan()
    {
        return $this->respond($this->model->getKaloriKegiatan(), 200);
    }

    public function getTotalKaloriHarian()
    {
        return $this->respond($this->model->getTotalKaloriHarian(), 200);
    }

    public function getSelisihKalori()
    {
        return $this->respond($this->model->getSelisihKalori(), 200);
    }
}
