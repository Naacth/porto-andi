<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFotoToBiodata extends Migration
{
    public function up()
    {
        $fields = [
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'riwayat_singkat',
            ],
        ];
        $this->forge->addColumn('biodata', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('biodata', 'foto');
    }
}
