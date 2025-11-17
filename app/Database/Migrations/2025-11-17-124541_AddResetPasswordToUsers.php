<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddResetPasswordToUsers extends Migration
{
    public function up()
    {
        $fields = [
            'reset_token' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'after'      => 'verified_at',
            ],
            'reset_expires_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
                'after'      => 'reset_token',
            ],
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['reset_token', 'reset_expires_at']);
    }
}
