<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title'        => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'slug'         => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'content'      => ['type' => 'TEXT', 'null' => false],
            'user_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'category_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'status'       => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'published', 'archived'],
                'default'    => 'draft',
            ],
            'featured_image' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => false],
            'updated_at'   => ['type' => 'DATETIME', 'null' => false]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE');
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
