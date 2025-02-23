<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'username'     => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'email'        => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'password_hash'=> ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'role'         => [
                'type'       => 'ENUM',
                'constraint' => ['superadmin', 'member'],
                'default'    => 'member',
            ],
            'created_at'   => ['type' => 'DATETIME', 'null' => false],
            'updated_at'   => ['type' => 'DATETIME', 'null' => false]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
