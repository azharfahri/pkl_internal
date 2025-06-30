<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama'=> 'SmartPhone sumsang',
            'slug'=> 'smartphone-sumsang',
            'deskripsi'=> 'Ini produk keluaran terbaru yang canggih',
            'harga'=> 13000000,
            'gambar'=> 'smartphone_sumsang.jpg',
            'stok' => 60,
            'categori_id'=> 1,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        Product::create([
            'nama'=> 'Laptop Macbook',
            'slug'=> 'laptop-macbook',
            'deskripsi'=> 'Ini Laptop canggih',
            'harga'=> 25000000,
            'gambar'=> 'laptop-macbook.jpg',
            'stok' => 60,
            'categori_id'=> 1,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        Product::create([
            'nama'=> 'Yakult',
            'slug'=> 'yakult',
            'deskripsi'=> 'Minuman Sehat',
            'harga'=> 2500,
            'gambar'=> 'yakult.jpg',
            'stok' => 60,
            'categori_id'=> 2,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}
