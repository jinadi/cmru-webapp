<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Officer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'empno' => [
				'type' => 'BIGINT',
				'constraint' => 255,
				'unsigned' => true,
				'auto_increment' => true,
            ],
            'empName' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
                'null' => false
            ],
            'workingLocation' => [
				'type' => 'INT',
				'null' => false
            ],
            'designation' => [
				'type' => 'INT',
				'null' => false
            ],
			   'contactNo' => [
				'type' => 'VARCHAR',
				'constraint' => '10',
				'null' => false
            ],
            'email' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
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
        $this->forge->addPrimaryKey('empno');
        $this->forge->createTable('officer');
    }

    public function down()
    {
        $this->forge->dropTable('officer');
    }
}
