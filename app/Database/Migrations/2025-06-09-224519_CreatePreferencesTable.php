<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePreferencesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'   => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'theme'     => [
                'type'       => 'ENUM',
                'constraint' => ['light', 'dark'],
                'default'    => 'light',
            ],
            'language'  => [
                'type'       => 'VARCHAR',
                'constraint' => 5,
                'default'    => 'es',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('user_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('user_preferences');
    }

    public function down()
    {
        $this->forge->dropTable('user_preferences', true);
    }
}