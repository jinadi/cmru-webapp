<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'username' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
                'null' => false
            ],
            'password' => [
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
        $this->forge->addPrimaryKey('username');
        $this->forge->createTable('users');
        $data = [
            'username' => 'admin',
            'password' => '202cb962ac59075b964b07152d234b70',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ];
        $db = db_connect();
        $builder = $db->table('users');
        $builder->insert($data);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
