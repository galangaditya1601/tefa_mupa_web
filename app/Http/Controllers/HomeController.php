<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Simulasi Data (Nanti diganti query Database)
        $data = [
            'hero' => [
                ['title' => 'Inovasi Tanpa Batas', 'subtitle' => 'Mencetak Generasi Unggul di Era Teknologi', 'image' => 'images/slider/slider1.jpg'],
                ['title' => 'TEFA Mupa', 'subtitle' => 'Solusi Kebutuhan Industri dan Jasa', 'image' => 'images/slider/slider2.jpg'],
            ],
            'profil' => [
                'title' => 'Tentang TEFA Mupa',
                'description' => 'Teaching Factory SMK Muhammadiyah Pakem adalah pusat pengembangan kompetensi siswa berbasis industri. Kami menghadirkan produk teknologi tepat guna dan layanan profesional.',
                'image' => 'https://placehold.co/600x400/gray/white?text=Foto+Gedung',
            ],
            // Data dipisah agar mudah dimapping di Tabs
            'produk' => [
                [
                    'nama' => 'Smart RFID Lock',
                    'slug' => 'smart-rfid-lock', // Slug added
                    'kategori' => 'IoT',
                    'img' => 'images/products/rfid.webp'
                ],
            ],
            'jasa' => [
                [
                    'nama' => 'Servis Motor',
                    'slug' => 'servis-motor', // Slug added
                    'kategori' => 'Teknisi',
                    'img' => 'images/products/service-motor.png'
                ],
                [
                    'nama' => 'Servis Mobil',
                    'slug' => 'servis-mobil', // Slug added
                    'kategori' => 'Teknisi',
                    'img' => 'images/products/service-mobil.jpg'
                ],
                [
                    'nama' => 'Desain Arsitektur',
                    'slug' => 'desain-arsitektur', // Slug added
                    'kategori' => 'Desain',
                    'img' => 'images/products/arsitek.png'
                ],
            ],
            'berita' => [
                ['judul' => 'Kunjungan Industri 2025', 'tanggal' => '24 Des 2025', 'excerpt' => 'Siswa melakukan kunjungan ke pabrik elektronik terkemuka...', 'img' => 'images/articles/kunjungan-industri.png'],
                ['judul' => 'Juara 1 Lomba Robotik', 'tanggal' => '20 Des 2025', 'excerpt' => 'Tim robotik sekolah berhasil menyabet emas...', 'img' => 'images/articles/robotik.jpg'],
                ['judul' => 'Workshop IoT Gratis', 'tanggal' => '15 Des 2025', 'excerpt' => 'Membuka wawasan masyarakat tentang teknologi...', 'img' => 'images/articles/wshop.png'],
            ],
            'gallery' => [
                'images/gallery/1.png',
                'images/gallery/2.jpg',
                'images/gallery/3.webp',
                'images/gallery/4.webp',
                'images/gallery/5.webp',
                'images/gallery/6.webp',
                'images/gallery/7.webp',
                'images/gallery/8.webp',

            ]
        ];

        return view('home', $data);
    }
}
