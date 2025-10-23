<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGaleriTable extends Migration
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
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'url_gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'kapster_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
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
        // Optional: Add a foreign key if you want to link a gallery item to a kapster
        $this->forge->addForeignKey('kapster_id', 'kapsters', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('galeri');
    }

    public function down()
    {
        $this->forge->dropTable('galeri');
    }
}
