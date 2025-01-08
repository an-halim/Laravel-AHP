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
            'tipe' => 'R002',
            'lantai' => 'Jl. Kebon Raya No. 01',
            'kamar' => 'Perumahan',
            'luas' => '1100',
            'harga' => '120000000',
            'garasi' => 'Lengkap',
            'keterangan' => 'Lain-lain',
            'gambar' => 'yy.jpg',
            'gambar_denah' => 'yy.jpg',
        ]);

        Alternative::create([
            'tipe' => 'R003',
            'lantai' => 'Jl. Kebon Raya No. 01',
            'kamar' => 'Perumahan',
            'luas' => '7000',
            'harga' => '150000000',
            'garasi' => 'Lengkap',
            'keterangan' => 'Lain-lain',
            'gambar' => 'yy.jpg',
            'gambar_denah' => 'yy.jpg',
        ]);


        Alternative::create([
            'tipe' => 'R005',
            'lantai' => 'Jl. Kebon Raya No. 01',
            'kamar' => 'Perumahan',
            'luas' => '1020',
            'harga' => '200000000',
            'garasi' => 'Lengkap',
            'keterangan' => 'Lain-lain',
            'gambar' => 'yy.jpg',
            'gambar_denah' => 'yy.jpg',
        ]);
    }
}
