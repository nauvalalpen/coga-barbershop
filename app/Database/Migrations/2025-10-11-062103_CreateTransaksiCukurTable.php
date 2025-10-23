<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksiCukurTable extends Migration
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
            'kapster_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'layanan_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'harga_saat_transaksi' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'comment' => 'Harga layanan saat itu'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('kapster_id', 'kapsters', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('layanan_id', 'layanans', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transaksi_cukur');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_cukur');
    }
}
