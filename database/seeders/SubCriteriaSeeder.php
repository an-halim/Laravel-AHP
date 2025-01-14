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
            'code' => 'KS001',
            'criteria_id' => 4,
            'name' => 'Rendah',
            'nilaik' => '1',
            'nilaib' => '1',
        ]);
        SubCriteria::create([
            'code' => 'KS002',
            'criteria_id' => 4,
            'name' => 'Standar',
            'nilaik' => '2',
            'nilaib' => '2',
        ]);
        SubCriteria::create([
            'code' => 'KS003',
            'criteria_id' => 4,
            'name' => 'Tinggi',
            'nilaik' => '3',
            'nilaib' => '3',
        ]);
        SubCriteria::create([
            'code' => 'KS004',
            'criteria_id' => 3,
            'name' => 'Cepat',
            'nilaik' => '1',
            'nilaib' => '1',
        ]);
        SubCriteria::create([
            'code' => 'KS005',
            'criteria_id' => 3,
            'name' => 'Standar',
            'nilaik' => '2',
            'nilaib' => '2',
        ]);
        SubCriteria::create([
            'code' => 'KS006',
            'criteria_id' => 3,
            'name' => 'Lama',
            'nilaik' => '3',
            'nilaib' => '3',
        ]);
        SubCriteria::create([
            'code' => 'KS007',
            'criteria_id' => 2,
            'name' => 'Sedikit',
            'nilaik' => '150',
            'nilaib' => '1',
        ]);
        SubCriteria::create([
            'code' => 'KS008',
            'criteria_id' => 2,
            'name' => 'Sedang',
            'nilaik' => '200',
            'nilaib' => '2',
        ]);
        SubCriteria::create([
            'code' => 'KS009',
            'criteria_id' => 2,
            'name' => 'Banyak',
            'nilaik' => '300',
            'nilaib' => '3',
        ]);
        SubCriteria::create([
            'code' => 'KS0010',
            'criteria_id' => 1,
            'name' => 'Murah',
            'nilaik' => '1000000000',
            'nilaib' => '1',
        ]);
        SubCriteria::create([
            'code' => 'KS0011',
            'criteria_id' => 1,
            'name' => 'Sedang',
            'nilaik' => '1500000000',
            'nilaib' => '2',
        ]);
        SubCriteria::create([
            'code' => 'KS0012',
            'criteria_id' => 1,
            'name' => 'Mahal',
            'nilaik' => '2000000000',
            'nilaib' => '3',
        ]);

        SubCriteria::create([
            'code' => 'KS0013',
            'criteria_id' => 5,
            'name' => 'Kecil',
            'nilaik' => '1',
            'nilaib' => '1',
        ]);
        SubCriteria::create([
            'code' => 'KS0014',
            'criteria_id' => 5,
            'name' => 'Sedang',
            'nilaik' => '2',
            'nilaib' => '2',
        ]);
        SubCriteria::create([
            'code' => 'KS0015',
            'criteria_id' => 5,
            'name' => 'Besar',
            'nilaik' => '3',
            'nilaib' => '3',
        ]);
    }
}
