<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class DaftarAsupan extends ResourceController
{
	protected $format         = 'json';
	protected $modelName      = 'App\Models\DaftarAsupanModel';

	public function getAsupan()
	{
		return $this->respond($this->model->getAsupan(), 200);
	}

	public function getDetailAsupan($id)
	{
		return $this->respond($this->model->getDetailAsupan($id), 200);
	}

	public function getSomeAsupan($nama)
	{
		return $this->respond($this->model->getSomeAsupan($nama), 200);
	}

	public function getFavAsupan()
	{
		return $this->respond($this->model->getFavAsupan(), 200);
	}

	public function insertAsupan()
	{
		$data = [
			'jenis'			  => $this->request->getPost('jenis'),
			'nama' 	 		  => $this->request->getPost('nama'),
			'merk' 			  => $this->request->getPost('merk'),
			'ukuran_perporsi' => $this->request->getPost('ukuran_perporsi'),
			'kalori' 		  => $this->request->getPost('kalori'),
			'lemak' 		  => $this->request->getPost('lemak'),
			'karbohidrat' 	  => $this->request->getPost('karbohidrat'),
			'protein' 		  => $this->request->getPost('protein'),
			'favorit' 		  => 'no'
		];

		return $this->model->insertAsupan($data);
	}

	public function updateAsupan($id)
	{
		$data = [
			'id'			  => $id,
			'jenis'			  => $this->request->getPost('jenis'),
			'nama' 	 		  => $this->request->getPost('nama'),
			'merk' 			  => $this->request->getPost('merk'),
			'ukuran_perporsi' => $this->request->getPost('ukuran_perporsi'),
			'kalori' 		  => $this->request->getPost('kalori'),
			'lemak' 		  => $this->request->getPost('lemak'),
			'karbohidrat' 	  => $this->request->getPost('karbohidrat'),
			'protein' 		  => $this->request->getPost('protein')
		];

		return $this->model->insertAsupan($data);
	}

	public function updateFavAsupan($id)
	{
		$data = [
			'id'	  => $id,
			'favorit' => $this->request->getPost('favorit')
		];

		return $this->model->insertAsupan($data);
	}

	public function deleteAsupan($id)
	{
		return $this->model->deleteAsupan($id);
	}
}
