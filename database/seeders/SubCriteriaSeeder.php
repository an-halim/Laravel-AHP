<?php

namespace Database\Seeders;

use App\Models\SubCriteria;
use Illuminate\Database\Seeder;

class SubCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCriteria::create([
            'code' => 'KS004',
            'criteria_id' => 3,
            'name' => 'Cepat',
        ]);
        SubCriteria::create([
            'code' => 'KS005',
            'criteria_id' => 3,
            'name' => 'Standar',
        ]);
        SubCriteria::create([
            'code' => 'KS006',
            'criteria_id' => 3,
            'name' => 'Lama',
        ]);
        SubCriteria::create([
            'code' => 'KS007',
            'criteria_id' => 2,
            'name' => 'Sedikit',
        ]);
        SubCriteria::create([
            'code' => 'KS008',
            'criteria_id' => 2,
            'name' => 'Sedang',
        ]);
        SubCriteria::create([
            'code' => 'KS009',
            'criteria_id' => 2,
            'name' => 'Banyak',
        ]);
        SubCriteria::create([
            'code' => 'KS0010',
            'criteria_id' => 1,
            'name' => 'Murah',
        ]);
        SubCriteria::create([
            'code' => 'KS0011',
            'criteria_id' => 1,
            'name' => 'Sedang',
        ]);
        SubCriteria::create([
            'code' => 'KS0012',
            'criteria_id' => 1,
            'name' => 'Mahal',
        ]);

        SubCriteria::create([
            'code' => 'KS0013',
            'criteria_id' => 4,
            'name' => 'Kecil',
        ]);
        SubCriteria::create([
            'code' => 'KS0014',
            'criteria_id' => 4,
            'name' => 'Sedang',
        ]);
        SubCriteria::create([
            'code' => 'KS0015',
            'criteria_id' => 4,
            'name' => 'Besar',
        ]);
    }
}
