<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGoalsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id'        => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'title'          => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'target_amount'  => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'current_amount' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0,
            ],
            'created_at'     => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'     => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'cover_image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'deadline' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'cover_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'deadline'    => ['type' => 'DATE', 'null' => true],
            'is_archived' => ['type' => 'BOOLEAN', 'default' => false],

        ]);

        // Clave primaria
        $this->forge->addKey('id', true);

        // Clave foránea a users.id
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        // Crear la tabla
        $this->forge->createTable('goals');
    }

    public function down()
    {
        // Elimina la tabla si existe
        $this->forge->dropTable('goals', true);
    }
}