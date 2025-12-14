<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSocialLinksToBiodata extends Migration
{
    public function up()
    {
        $fields = [
            'link_github' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'foto',
            ],
             'link_linkedin' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'link_github',
            ],
             'link_instagram' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'link_linkedin',
            ],
             'link_twitter' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'link_instagram',
            ],
        ];
        $this->forge->addColumn('biodata', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('biodata', ['link_github', 'link_linkedin', 'link_instagram', 'link_twitter']);
    }
}
