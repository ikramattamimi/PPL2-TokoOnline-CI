<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type'           => 'DATE',
            ],
            'total_transaksi' => [
                'type'           => 'DECIMAL(15,0)',
            ],
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'no_telepon' => [
                'type'           => 'INT',
                'constraint'     => 13,
            ],
            'alamat' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'kecamatan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'kota' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'created_at DATETIME default CURRENT_TIMESTAMP',
            'updated_at DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
