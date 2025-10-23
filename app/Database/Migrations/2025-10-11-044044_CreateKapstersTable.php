<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKapstersTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'unique' => true
            ],
            'spesialisasi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'foto_profil' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['aktif', 'tidak_aktif'],
                'default' => 'aktif'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kapsters');
    }

    public function down()
    {
        //
        $this->forge->dropTable('kapsters');
    }
}
