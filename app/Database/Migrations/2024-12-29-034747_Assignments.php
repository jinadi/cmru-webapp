<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Assignments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'assignid' => [
				'type' => 'BIGINT',
				'constraint' => 255,
                'null' => false,
                'auto_increment' => true,
            ],
            'assignitemno' => [
				'type' => 'BIGINT',
				'constraint' => 255,
                'null' => false
            ],
            'assignempno' => [
				'type' => 'BIGINT',
				'constraint' => 255,
                'null' => false
            ],
			'assignconfig' => [
				'type' => 'VARCHAR',
                'constraint' => '1000',
				'null' => false
            ],
            'assignuser' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
                'null' => false
            ],
            'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
            ],
            'updated_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
            ],
            'deleted_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
            ],
        ]);
        $this->forge->addPrimaryKey('assignid');
		$this->forge->addForeignKey('assignitemno', 'items', 'itemno','CASCADE','CASCADE');
        $this->forge->addForeignKey('assignempno', 'officer', 'empno','CASCADE','CASCADE');
        $this->forge->addForeignKey('assignuser', 'users', 'username');
        $this->forge->createTable('assignments');
    }

    public function down()
    {
        $this->forge->dropTable('assignments');
    }
}
