<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Catatanminum extends Migration
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
			'porsi' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			],
			'tanggal' => [
				'type'		 => 'VARCHAR',
				'constraint' => 255,
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('catatan_minum');
	}

	public function down()
	{
		$this->forge->dropTable('catatan_minum');
	}
}
