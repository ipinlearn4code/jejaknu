<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJejaknuTables extends Migration
{
    public function up()
    {
        // Users Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'password_hash' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'role' => ['type' => 'ENUM', 'constraint' => ['superadmin', 'member'], 'default' => 'member'],
            'avatar' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => false],
            'updated_at' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('username');
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');

        // Cadre Profiles Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'nik' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'address' => ['type' => 'TEXT', 'null' => true],
            'education' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'skills' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => false],
            'updated_at' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('cadre_profiles');

        // Posts Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'content' => ['type' => 'TEXT', 'null' => false],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'category' => ['type' => 'ENUM', 'constraint' => ['article', 'news'], 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['draft', 'published', 'archived'], 'default' => 'draft'],
            'featured_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => false],
            'updated_at' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('posts');

        // Messages Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'message' => ['type' => 'TEXT', 'null' => false],
            'audio_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => false],
            'updated_at' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('messages');

        // Events Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'description' => ['type' => 'TEXT', 'null' => true],
            'location' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'event_type' => ['type' => 'ENUM', 'constraint' => ['special', 'recurring'], 'null' => false],
            'created_at' => ['type' => 'DATETIME', 'null' => false],
            'updated_at' => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('events');

        // Event Schedules Table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'event_id' => ['type' => 'INT', 'constraint' => 11, 'null' => false],
            'event_date' => ['type' => 'DATE', 'null' => true],
            'recurrence_type' => ['type' => 'ENUM', 'constraint' => ['mingguan', 'bulanan'], 'null' => true],
            'recurrence_day' => ['type' => 'ENUM', 'constraint' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'], 'null' => true],
            'recurrence_week' => ['type' => 'ENUM', 'constraint' => ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'last'], 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('event_id', 'events', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('event_schedules');
    }

    public function down()
    {
        $this->forge->dropTable('event_schedules');
        $this->forge->dropTable('events');
        $this->forge->dropTable('messages');
        $this->forge->dropTable('posts');
        $this->forge->dropTable('cadre_profiles');
        $this->forge->dropTable('users');
    }
}
