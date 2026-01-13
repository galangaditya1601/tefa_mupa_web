<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::insert([
            [
                'type' => 'catalog',
                'slug' => 'produk',
                'name' => 'Produk',
                'description' => 'Produk Kami'
            ],
            [
                'type' => 'catalog',
                'slug' => 'jasa',
                'name' => 'Jasa',
                'description' => 'Jasa Kami'
            ],
            [
                'type' => 'sub_catalog',
                'slug' => 'iot',
                'name' => 'Iot',
                'description' => 'Produk sub Iot'
            ],
            [
                'type' => 'sub_catalog',
                'slug' => 'teknisi',
                'name' => 'Teknisi',
                'description' => 'Produk sub Tenkisi'
            ],
            [
                'type' => 'sub_catalog',
                'slug' => 'desain',
                'name' => 'desain',
                'description' => 'Jasa sub Desain'
            ],
            [
                'type' => 'content',
                'slug' => 'prestasi',
                'name' => 'prestasi',
                'description' => 'Prestasi Sekolah'
            ]
        ]);
    }
}
