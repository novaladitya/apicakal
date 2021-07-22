<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarKegiatanModel extends Model
{
	protected $table = 'daftar_kegiatan';
	protected $allowedFields = [
		'nama',
		'kalori'
	];

	public function getKegiatan()
	{
		return $this->findAll();
	}

	public function getDetailKegiatan($id)
	{
		return $this->getWhere(['id' => $id])->getRow();
	}

	public function insertKegiatan($data)
	{
		return $this->save($data);
	}

	public function deleteKegiatan($id)
	{
		return $this->delete($id);
	}
}
