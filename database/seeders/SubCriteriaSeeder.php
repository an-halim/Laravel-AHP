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
            'value' => '1',
            'weight' => '1',
            'operator' => '>=',
        ]);
        SubCriteria::create([
            'code' => 'KS005',
            'criteria_id' => 3,
            'name' => 'Standar',
            'value' => '2',
            'weight' => '2',
            'operator' => '>=',
        ]);
        SubCriteria::create([
            'code' => 'KS006',
            'criteria_id' => 3,
            'name' => 'Lama',
            'value' => '3',
            'weight' => '3',
            'operator' => '>=',
        ]);
        SubCriteria::create([
            'code' => 'KS007',
            'criteria_id' => 2,
            'name' => 'Sedikit',
            'value' => '150',
            'weight' => '1',
            'operator' => '>=',
        ]);
        SubCriteria::create([
            'code' => 'KS008',
            'criteria_id' => 2,
            'name' => 'Sedang',
            'value' => '200',
            'weight' => '2',
            'operator' => '>=',
        ]);
        SubCriteria::create([
            'code' => 'KS009',
            'criteria_id' => 2,
            'name' => 'Banyak',
            'value' => '300',
            'weight' => '3',
            'operator' => '>=',
        ]);
        SubCriteria::create([
            'code' => 'KS0010',
            'criteria_id' => 1,
            'name' => 'Murah',
            'value' => '100000',
            'weight' => '1',
            'operator' => '>=',
        ]);
        SubCriteria::create([
            'code' => 'KS0011',
            'criteria_id' => 1,
            'name' => 'Sedang',
            'value' => '150000',
            'weight' => '2',
            'operator' => '>=',
        ]);
        SubCriteria::create([
            'code' => 'KS0012',
            'criteria_id' => 1,
            'name' => 'Mahal',
            'value' => '3000000',
            'weight' => '3',
            'operator' => '>=',
        ]);

        SubCriteria::create([
            'code' => 'KS0013',
            'criteria_id' => 4,
            'name' => 'Kecil',
            'value' => '1',
            'weight' => '1',
            'operator' => '>=',
        ]);
        SubCriteria::create([
            'code' => 'KS0014',
            'criteria_id' => 4,
            'name' => 'Sedang',
            'value' => '2',
            'weight' => '2',
            'operator' => '>=',
        ]);
        SubCriteria::create([
            'code' => 'KS0015',
            'criteria_id' => 4,
            'name' => 'Besar',
            'value' => '3',
            'weight' => '3',
            'operator' => '>=',
        ]);
    }
}
