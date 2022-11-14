<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'    => 'Jam Tangan',
                'stok'    => '50',
                'harga'    => '500000',
                'rating'    => '0',
                'gambar'    => 'jam.jpg',
            ],
            [
                'nama'    => 'Gelas',
                'stok'    => '23',
                'harga'    => '23000',
                'rating'    => '0',
                'gambar'    => 'gelas.jpg',
            ],
            [
                'nama'    => 'Laptop',
                'stok'    => '145',
                'harga'    => '12000000',
                'rating'    => '0',
                'gambar'    => 'laptop.jpg',
            ],
            [
                'nama'    => 'Keyboard',
                'stok'    => '56',
                'harga'    => '350000',
                'rating'    => '0',
                'gambar'    => 'keyboard.jpg',
            ],
            [
                'nama'    => 'Mouse',
                'stok'    => '12',
                'harga'    => '150000',
                'rating'    => '0',
                'gambar'    => 'mouse.jpg',
            ],
            [
                'nama'    => 'Mousepad',
                'stok'    => '10',
                'harga'    => '20000',
                'rating'    => '0',
                'gambar'    => 'mousepad.jpg',
            ],
            [
                'nama'    => 'Webcam',
                'stok'    => '20',
                'harga'    => '300000',
                'rating'    => '0',
                'gambar'    => 'webcam.jpg',
            ],
            [
                'nama'    => 'Jeruk',
                'stok'    => '500',
                'harga'    => '23000',
                'rating'    => '0',
                'gambar'    => 'jeruk.jpg',
            ],
        ];

        $this->db->table('barang')->insertBatch($data);
    }
}
