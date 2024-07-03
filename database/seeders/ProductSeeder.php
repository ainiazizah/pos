<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name_product' => 'Beras 5 Kg', 'image_product' => 'photo_product/Beras 5 Kg.jpg', 'description_product' => 'Dengan kualitas terbaik tapi dengan harga yang terjangkau', 'price_product' => '65000', 'id_category' => '1'],
            ['name_product' => 'Minyak Goreng 1 L', 'image_product' => 'photo_product/Minyak Goreng 1 L.jpg', 'description_product' => 'Menggoreng makanan menjadi nikmat', 'price_product' => '18000', 'id_category' => '1'],
            ['name_product' => 'Gula 1 Kg', 'image_product' => 'photo_product/Gula 1 Kg.jpg', 'description_product' => 'Gula Homemade dengan kualitas yang bersaing', 'price_product' => '8000', 'id_category' => '1'],
            ['name_product' => 'Lukisan', 'image_product' => 'photo_product/Lukisan.jpg', 'description_product' => 'Dapat request gambar sesuai dengan pesanan', 'price_product' => '50000', 'id_category' => '2'],
            ['name_product' => 'Miniatur Kayu', 'image_product' => 'photo_product/Miniatur Kayu.jpg', 'description_product' => 'Pesanan Miniatur dapat dibuat sesuai dengan keinginan pembeli', 'price_product' => '125000', 'id_category' => '2'],
            ['name_product' => 'Kursi Rotan', 'image_product' => 'photo_product/Kursi Rotan.jpg', 'description_product' => 'Memiliki bentuk yang klasik dan menawan', 'price_product' => '135000', 'id_category' => '2'],
            ['name_product' => 'Bawang Merah 1 Kg', 'image_product' => 'photo_product/Bawang Merah 1 Kg.jpg', 'description_product' => 'Penanaman menggunakan cara yang tradisional dan tidak menggunakan bahan kimia', 'price_product' => '28000', 'id_category' => '3'],
            ['name_product' => 'Jahe 1 Kg', 'image_product' => 'photo_product/Jahe 1 Kg.jpg', 'description_product' => 'Jahe dengan kualitas terbaik dan ditanam secara alami', 'price_product' => '13500', 'id_category' => '3'],
            ['name_product' => 'Bawang Putih 1 Kg', 'image_product' => 'photo_product/Bawang Putih 1 Kg.jpg', 'description_product' => 'Hasil panen yang masih segar dan dirawat dengan cara yang tradisional', 'price_product' => '31000', 'id_category' => '3'],
        ]);
    }
}
