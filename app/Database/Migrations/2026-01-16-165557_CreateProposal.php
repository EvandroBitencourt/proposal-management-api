<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProposal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'customer_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'product' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'monthly_value' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],

            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'DRAFT',
            ],

            'origin' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],

            'version' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('customer_id');


        $this->forge->addForeignKey('customer_id', 'customer', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('proposal');
    }

    public function down()
    {
        $this->forge->dropTable('proposal');
    }
}
