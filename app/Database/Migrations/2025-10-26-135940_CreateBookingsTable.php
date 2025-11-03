<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'pelanggan_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'kapster_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'layanan_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tanggal_booking' => ['type' => 'DATE'],
            'jam_booking' => ['type' => 'TIME'],
            'status' => ['type' => 'ENUM', 'constraint' => ['confirmed', 'completed', 'cancelled'], 'default' => 'confirmed'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pelanggan_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kapster_id', 'kapsters', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('layanan_id', 'layanans', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        //
        $this->forge->dropTable('bookings');
    }
}
