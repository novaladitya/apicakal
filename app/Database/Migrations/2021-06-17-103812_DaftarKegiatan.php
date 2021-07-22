<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DaftarKegiatan extends Migration
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
			'nama' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'kalori' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('daftar_kegiatan');
	}

	public function down()
	{
		$this->forge->dropTable('data_kegiatan');
	}
}
