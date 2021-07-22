<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarAsupanModel extends Model
{
	protected $table = 'daftar_asupan';
	protected $allowedFields = [
		'jenis',
		'nama',
		'merk',
		'ukuran_perporsi',
		'kalori',
		'lemak',
		'karbohidrat',
		'protein',
		'favorit'
	];

	public function getAsupan()
	{
		return $this->findAll();
	}

	public function getDetailAsupan($id)
	{
		return $this->getWhere(['id' => $id])->getRow();
	}

	public function getSomeAsupan($nama)
	{
		return $this->query("SELECT * FROM $this->table WHERE nama LIKE '%$nama%'")->getResult();
	}

	public function getFavAsupan()
	{
		return $this->query("SELECT * FROM $this->table WHERE favorit LIKE 'yes'")->getResult();
	}

	public function insertAsupan($data)
	{
		return $this->save($data);
	}

	public function deleteAsupan($id)
	{
		return $this->delete($id);
	}
}
