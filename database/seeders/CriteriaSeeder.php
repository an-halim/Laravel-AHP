<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create([
            'code' => 'C1',
            'name' => 'HARGA'
        ]);
        Criteria::create([
            'code' => 'C2',
            'name' => 'WATT'
        ]);
        Criteria::create([
            'code' => 'C3',
            'name' => 'DAYA TAHAN'
        ]);
        Criteria::create([
            'code' => 'C5',
            'name' => 'GARANSI'
        ]);
        Criteria::create([
            'code' => 'C4',
            'name' => 'KAPASITAS'
        ]);
    }
}
