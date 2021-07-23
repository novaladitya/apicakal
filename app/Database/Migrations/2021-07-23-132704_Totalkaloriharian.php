<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Totalkaloriharian extends Migration
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
			],
			'jenis' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'tanggal' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('total_kaloriharian');
	}

	public function down()
	{
		$this->forge->dropTable('total_kaloriharian');
	}
}
