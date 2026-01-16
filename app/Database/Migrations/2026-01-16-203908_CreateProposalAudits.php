<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProposalAudits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'proposal_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],

            'actor' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],

            'event' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],

            'payload' => [
                'type' => 'JSON',
                'null' => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey(
            'proposal_id',
            'proposal',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('proposal_audits');
    }

    public function down()
    {
        $this->forge->dropTable('proposal_audits');
    }
}
