<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyVerificationInUsers extends Migration
{
    public function up()
    {
        // Step 1: Modify the existing column
        $modify_fields = [
            'verification_token' => [
                'name'       => 'verification_code', // Rename the column
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => true,
            ],
        ];
        $this->forge->modifyColumn('users', $modify_fields);

        // Step 2: Add the new column
        $add_fields = [
            'verification_expires_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
                'after'      => 'verification_code', // Place it after the renamed column
            ],
        ];
        $this->forge->addColumn('users', $add_fields);
    }

    public function down()
    {
        $fields = [
            'verification_code' => [
                'name' => 'verification_token',
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
        ];
        $this->forge->modifyColumn('users', $fields);
        $this->forge->dropColumn('users', 'verification_expires_at');
    }
}
