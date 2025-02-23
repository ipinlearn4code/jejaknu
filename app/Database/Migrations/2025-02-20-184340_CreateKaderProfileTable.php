<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKaderProfileTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false
            ],
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'education' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'skills' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('cadre_profiles');
    }

    public function down()
    {
        $this->forge->dropTable('cadre_profiles');
    }
}
