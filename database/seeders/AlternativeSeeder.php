<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alternative::create([
            'model' => 'RC-01',
            'nama' => 'Rice Cooker Panasonic',
            'harga' => 500000,
            'watt' => 500,
            'kapasitas' => 1.8, // dalam liter
            'dayatahan' => 5, // daya tahan dalam tahun
            'keterangan' => 'Rice cooker berkualitas tinggi dengan teknologi pemasakan cepat.',
            'gambar' => 'rice_cooker_panasonic.jpg', // Anda bisa menyesuaikan path gambar sesuai dengan struktur direktori Anda
        ]);

        Alternative::create([
            'model' => 'RC-02',
            'nama' => 'Rice Cooker Sharp',
            'harga' => 450000,
            'watt' => 400,
            'kapasitas' => 1.5,
            'dayatahan' => 4,
            'keterangan' => 'Rice cooker hemat energi dan mudah digunakan.',
            'gambar' => 'rice_cooker_sharp.jpg',
        ]);

        Alternative::create([
            'model' => 'RC-03',
            'nama' => 'Rice Cooker Toshiba',
            'harga' => 700000,
            'watt' => 600,
            'kapasitas' => 2.0,
            'dayatahan' => 6,
            'keterangan' => 'Rice cooker dengan fitur multifungsi dan daya tahan lama.',
            'gambar' => 'rice_cooker_toshiba.jpg',
        ]);
    }
}
