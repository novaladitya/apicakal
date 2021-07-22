<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarAsupan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 100,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'jenis' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'nama' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'merk' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'ukuran_perporsi' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'kalori' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'lemak' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'karbohidrat' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'protein' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'favorit' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('daftar_asupan');
	}

	public function down()
	{
		$this->forge->dropTable('daftar_asupan');
	}
}
