<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
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
            'jumlah' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'harga' => [
                'type'           => 'DECIMAL(15,0)',
            ],
            'transaksi_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'barang_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'created_at DATETIME default CURRENT_TIMESTAMP',
            'updated_at DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('transaksi_id', 'transaksi', 'id');
        $this->forge->addForeignKey('barang_id', 'barang', 'id');
        $this->forge->createTable('order');
    }

    public function down()
    {
        $this->forge->dropTable('order');
    }
}
