<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
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
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'stok' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'harga' => [
                'type'           => 'DECIMAL(15,0)',
            ],
            'rating' => [
                'type'           => 'FLOAT',
                'constraint'     => 5,
                'null'           => true,
            ],
            'gambar' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'created_at DATETIME default CURRENT_TIMESTAMP',
            'updated_at DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
