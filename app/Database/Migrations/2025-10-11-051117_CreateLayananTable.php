<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLayananTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_layanan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'harga' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'durasi_menit' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('layanans');
    }

    public function down()
    {
        $this->forge->dropTable('layanans');
    }
}
