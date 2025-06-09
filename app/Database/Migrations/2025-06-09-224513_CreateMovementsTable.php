<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMovementsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'goal_id'    => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'amount'     => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'type'       => [
                'type'       => 'ENUM',
                'constraint' => ['in', 'out'],
                'default'    => 'in',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'description' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'date' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);

        // Clave primaria
        $this->forge->addKey('id', true);

        // Clave foránea hacia goals.id
        $this->forge->addForeignKey('goal_id', 'goals', 'id', 'CASCADE', 'CASCADE');

        // Crear la tabla
        $this->forge->createTable('movements');
    }

    public function down()
    {
        $this->forge->dropTable('movements', true);
    }
}