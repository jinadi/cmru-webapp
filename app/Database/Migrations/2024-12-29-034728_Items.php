<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Items extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'itemno' => [
				'type' => 'BIGINT',
				'constraint' => 255,
				'unsigned' => true,
				'auto_increment' => true,
            ],
            'iteminventoryno' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
                'null' => false
            ],
            'itemname' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
                'null' => false
            ],
            'itemtype' => [
				'type' => 'INT',
				'null' => false
            ],
            'itembrand' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
                'null' => false
            ],
			'itemmodel' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => false
            ],
            'itempurchased' => [
				'type' => 'DATE',
				'null' => false
            ],
            'itemwarranty' => [
				'type' => 'INT',
				'null' => false
            ],
            'itemremarks' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => true
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
        $this->forge->addPrimaryKey('itemno');
        $this->forge->createTable('items');
    }

    public function down()
    {
        $this->forge->dropTable('items');
    }
}
