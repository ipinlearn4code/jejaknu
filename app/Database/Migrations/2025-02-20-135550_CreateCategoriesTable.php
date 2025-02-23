<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false, 'auto_increment' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'slug'       => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => false],
            'updated_at' => ['type' => 'DATETIME', 'null' => false]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('name');
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
