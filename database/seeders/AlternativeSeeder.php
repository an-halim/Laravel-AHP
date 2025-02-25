<?php

namespace Database\Seeders;

use App\Models\Alternative;
use App\Models\Comparisons;
use App\Models\Criteria;
use App\Models\SubCriteria;
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
        $data = [
            ['nama' => 'Gaboor', 'model' => 'RC50M - BE01A', 'harga' => 250000, 'garansi' => 3, 'watt' => 400, 'kapasitas' => 2.2],
            ['nama' => 'Philips', 'model' => 'HD3115', 'harga' => 500000, 'garansi' => 5, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Panasonic', 'model' => 'SR-CEZ18', 'harga' => 700000, 'garansi' => 4, 'watt' => 350, 'kapasitas' => 1.8],
            ['nama' => 'Cosmos', 'model' => 'CRJ-6601', 'harga' => 350000, 'garansi' => 3, 'watt' => 300, 'kapasitas' => 1.2],
            ['nama' => 'Sharp', 'model' => 'KS-T18TL', 'harga' => 850000, 'garansi' => 6, 'watt' => 360, 'kapasitas' => 2],
            ['nama' => 'Zojirushi', 'model' => 'NS-ZLH18', 'harga' => 1200000, 'garansi' => 7, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Yong Ma', 'model' => 'MC-3900', 'harga' => 600000, 'garansi' => 4, 'watt' => 310, 'kapasitas' => 1.5],
            ['nama' => 'Midea', 'model' => 'MB-FS5017', 'harga' => 750000, 'garansi' => 5, 'watt' => 420, 'kapasitas' => 2],
            ['nama' => 'Toshiba', 'model' => 'RC-18NT', 'harga' => 900000, 'garansi' => 6, 'watt' => 370, 'kapasitas' => 1.8],
            ['nama' => 'Electrolux', 'model' => 'ERC6503W', 'harga' => 1100000, 'garansi' => 6, 'watt' => 440, 'kapasitas' => 1.8],
            ['nama' => 'Maimete ', 'model' => 'MT-99E', 'harga' => 200000, 'garansi' => 2, 'watt' => 200, 'kapasitas' => 1.5],
            ['nama' => 'Sanken', 'model' => 'SJ-150', 'harga' => 507000, 'garansi' => 5, 'watt' => 350, 'kapasitas' => 1.2],
            ['nama' => 'Sanken', 'model' => 'SJ-2200', 'harga' => 558000, 'garansi' => 5, 'watt' => 350, 'kapasitas' => 2],
            ['nama' => 'Sanken', 'model' => 'SJ-120SP', 'harga' => 414000, 'garansi' => 3, 'watt' => 300, 'kapasitas' => 1],
            ['nama' => 'Sanken', 'model' => 'SJ-2060', 'harga' => 490000, 'garansi' => 4, 'watt' => 350, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-1999', 'harga' => 630000, 'garansi' => 5, 'watt' => 350, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-3000', 'harga' => 669000, 'garansi' => 6, 'watt' => 350, 'kapasitas' => 2],
            ['nama' => 'Miyako', 'model' => 'MCM-612', 'harga' => 226500, 'garansi' => 4, 'watt' => 365, 'kapasitas' => 1.2],
            ['nama' => 'Miyako', 'model' => 'MCM-528', 'harga' => 227000, 'garansi' => 5, 'watt' => 395, 'kapasitas' => 1.8],
            ['nama' => 'Miyako', 'model' => 'MCM-606A', 'harga' => 199500, 'garansi' => 2, 'watt' => 300, 'kapasitas' => 1.8],
            ['nama' => 'Miyako', 'model' => 'MCM-508 SBC', 'harga' => 228000, 'garansi' => 3, 'watt' => 395, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-2000', 'harga' => 450000, 'garansi' => 4, 'watt' => 300, 'kapasitas' => 1.5],
            ['nama' => 'Hitachi', 'model' => 'RZ-D18F', 'harga' => 1000000, 'garansi' => 8, 'watt' => 600, 'kapasitas' => 1.8],
            ['nama' => 'Maspion', 'model' => 'MRJ-180', 'harga' => 350000, 'garansi' => 3, 'watt' => 280, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-200', 'harga' => 1300000, 'garansi' => 6, 'watt' => 500, 'kapasitas' => 2.0],
            ['nama' => 'Kirin', 'model' => 'KRC-389', 'harga' => 500000, 'garansi' => 5, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Black & Decker', 'model' => 'RC650', 'harga' => 900000, 'garansi' => 6, 'watt' => 440, 'kapasitas' => 1.8],
            ['nama' => 'Modena', 'model' => 'CR 1500', 'harga' => 1500000, 'garansi' => 7, 'watt' => 480, 'kapasitas' => 2.0],
            ['nama' => 'Tiger', 'model' => 'JNP-1800', 'harga' => 1700000, 'garansi' => 8, 'watt' => 600, 'kapasitas' => 1.8],
            ['nama' => 'Pigeon', 'model' => 'Joy Rice Cooker', 'harga' => 400000, 'garansi' => 3, 'watt' => 350, 'kapasitas' => 1.2],
            ['nama' => 'Tefal', 'model' => 'RK1028', 'harga' => 950000, 'garansi' => 6, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Denpoo', 'model' => 'SC-28B', 'harga' => 350, 'garansi' => 3, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'National', 'model' => 'SRC-520', 'harga' => 375, 'garansi' => 4, 'watt' => 380, 'kapasitas' => 2.0],
            ['nama' => 'Zojirushi', 'model' => 'NS-ZCC18', 'harga' => 2100000, 'garansi' => 8, 'watt' => 650, 'kapasitas' => 1.8],
            ['nama' => 'Midea', 'model' => 'MB-FS5015', 'harga' => 650, 'garansi' => 5, 'watt' => 500, 'kapasitas' => 1.5],
            ['nama' => 'Philips', 'model' => 'HD3132', 'harga' => 1150000, 'garansi' => 7, 'watt' => 450, 'kapasitas' => 2.0],
            ['nama' => 'Panasonic', 'model' => 'SR-ZX105', 'harga' => 2000000, 'garansi' => 8, 'watt' => 580, 'kapasitas' => 1.5],
            ['nama' => 'Electrolux', 'model' => 'ERC3505', 'harga' => 850, 'garansi' => 6, 'watt' => 430, 'kapasitas' => 1.8],
            ['nama' => 'Russell Hobbs', 'model' => 'RH-21210', 'harga' => 1400000, 'garansi' => 7, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Toshiba', 'model' => 'RC-5SLN', 'harga' => 1100000, 'garansi' => 6, 'watt' => 400, 'kapasitas' => 1.0],
            ['nama' => 'Tiger', 'model' => 'JBV-S10U', 'harga' => 1500000, 'garansi' => 7, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Yong Ma', 'model' => 'MC-3500', 'harga' => 750, 'garansi' => 6, 'watt' => 460, 'kapasitas' => 2.0],
            ['nama' => 'Philips', 'model' => 'HD3129', 'harga' => 900, 'garansi' => 6, 'watt' => 500, 'kapasitas' => 2.2],
            ['nama' => 'Sharp', 'model' => 'KS-N18MG', 'harga' => 500, 'garansi' => 5, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Panasonic', 'model' => 'SR-TEM18', 'harga' => 1050000, 'garansi' => 7, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Midea', 'model' => 'MB-FS5018', 'harga' => 770, 'garansi' => 5, 'watt' => 400, 'kapasitas' => 2.0],
            ['nama' => 'Tefal', 'model' => 'RK5001', 'harga' => 1250000, 'garansi' => 7, 'watt' => 530, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-5000', 'harga' => 430, 'garansi' => 4, 'watt' => 380, 'kapasitas' => 1.5],
            ['nama' => 'Oxone', 'model' => 'OX-214', 'harga' => 1150000, 'garansi' => 6, 'watt' => 520, 'kapasitas' => 2.0],
            ['nama' => 'Kirin', 'model' => 'KRC-390', 'harga' => 550, 'garansi' => 5, 'watt' => 390, 'kapasitas' => 1.8],
            ['nama' => 'Denpoo', 'model' => 'SC-28B Digital', 'harga' => 480, 'garansi' => 4, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'National', 'model' => 'SRC-660', 'harga' => 390, 'garansi' => 4, 'watt' => 370, 'kapasitas' => 1.5],
            ['nama' => 'Mitochiba', 'model' => 'CH-200', 'harga' => 520, 'garansi' => 5, 'watt' => 360, 'kapasitas' => 2.0],
            ['nama' => 'Ichiko', 'model' => 'RC-18', 'harga' => 450, 'garansi' => 4, 'watt' => 350, 'kapasitas' => 1.8],
            ['nama' => 'Idealife', 'model' => 'IL-213', 'harga' => 630, 'garansi' => 6, 'watt' => 450, 'kapasitas' => 2.2],
            ['nama' => 'Advance', 'model' => 'ARC-180', 'harga' => 400, 'garansi' => 4, 'watt' => 380, 'kapasitas' => 1.5],
            ['nama' => 'Sanken', 'model' => 'SJ-300', 'harga' => 470, 'garansi' => 4, 'watt' => 390, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-316', 'harga' => 1250000, 'garansi' => 7, 'watt' => 550, 'kapasitas' => 2.0],
            ['nama' => 'Tefal', 'model' => 'RK1045', 'harga' => 1000000, 'garansi' => 6, 'watt' => 530, 'kapasitas' => 1.8],
            ['nama' => 'Polytron', 'model' => 'PRC-501', 'harga' => 400, 'garansi' => 5, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'BOLDe', 'model' => 'Super Cook', 'harga' => 350, 'garansi' => 4, 'watt' => 400, 'kapasitas' => 1.2],
            ['nama' => 'Cosmos', 'model' => 'CRJ-3301', 'harga' => 370, 'garansi' => 5, 'watt' => 390, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-202', 'harga' => 450, 'garansi' => 5, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Maspion', 'model' => 'MRJ-208', 'harga' => 325, 'garansi' => 4, 'watt' => 360, 'kapasitas' => 1.5],
            ['nama' => 'Mito', 'model' => 'R2', 'harga' => 320, 'garansi' => 3, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Philips', 'model' => 'HD3132/33', 'harga' => 1000000, 'garansi' => 7, 'watt' => 400, 'kapasitas' => 2.0],
            ['nama' => 'Miyako', 'model' => 'MCM-609', 'harga' => 285, 'garansi' => 3, 'watt' => 330, 'kapasitas' => 1.2],
            ['nama' => 'Sharp', 'model' => 'KSR19ST', 'harga' => 550, 'garansi' => 5, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Idealife', 'model' => 'IL-210S', 'harga' => 330, 'garansi' => 4, 'watt' => 370, 'kapasitas' => 1.5],
            ['nama' => 'Bolde', 'model' => 'Super Cook Plus', 'harga' => 280, 'garansi' => 3, 'watt' => 350, 'kapasitas' => 1.2],
            ['nama' => 'Turbo', 'model' => 'CRL 1500', 'harga' => 800, 'garansi' => 6, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Yong Ma', 'model' => 'MC-1500', 'harga' => 700, 'garansi' => 5, 'watt' => 430, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-130', 'harga' => 310, 'garansi' => 4, 'watt' => 340, 'kapasitas' => 1.2],
            ['nama' => 'Philips', 'model' => 'HD3119/33', 'harga' => 950, 'garansi' => 6, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Mitochiba', 'model' => 'CH-500', 'harga' => 370, 'garansi' => 5, 'watt' => 390, 'kapasitas' => 1.5],
            ['nama' => 'Cosmos', 'model' => 'CRJ-6606', 'harga' => 450, 'garansi' => 5, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Polytron', 'model' => 'PRC-1901', 'harga' => 550, 'garansi' => 5, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Denpoo', 'model' => 'SC-23D', 'harga' => 270, 'garansi' => 3, 'watt' => 300, 'kapasitas' => 1.8],
            ['nama' => 'Cosmos', 'model' => 'CRJ-323', 'harga' => 370, 'garansi' => 4, 'watt' => 390, 'kapasitas' => 1.5],
            ['nama' => 'Maspion', 'model' => 'MRJ-205', 'harga' => 420, 'garansi' => 5, 'watt' => 360, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-203', 'harga' => 430, 'garansi' => 4, 'watt' => 400, 'kapasitas' => 2.0],
            ['nama' => 'BOLDe', 'model' => 'Super Cook Pro', 'harga' => 340, 'garansi' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'Mito', 'model' => 'R5', 'harga' => 410, 'garansi' => 4, 'watt' => 370, 'kapasitas' => 1.8],
            ['nama' => 'Philips', 'model' => 'HD3115/33', 'harga' => 980, 'garansi' => 6, 'watt' => 420, 'kapasitas' => 2.0],
            ['nama' => 'Panasonic', 'model' => 'SR-GA421', 'harga' => 1250000, 'garansi' => 8, 'watt' => 520, 'kapasitas' => 2.2],
            ['nama' => 'Sharp', 'model' => 'KS-TH18', 'harga' => 700, 'garansi' => 5, 'watt' => 460, 'kapasitas' => 1.8],
            ['nama' => 'Turbo', 'model' => 'CRL 500', 'harga' => 750, 'garansi' => 6, 'watt' => 450, 'kapasitas' => 2.0],
            ['nama' => 'Yong Ma', 'model' => 'MC-3500D', 'harga' => 880, 'garansi' => 6, 'watt' => 420, 'kapasitas' => 2.0],
            ['nama' => 'Sanken', 'model' => 'SJ-450', 'harga' => 290, 'garansi' => 3, 'watt' => 380, 'kapasitas' => 1.2],
            ['nama' => 'Miyako', 'model' => 'MCM-508', 'harga' => 325, 'garansi' => 3, 'watt' => 320, 'kapasitas' => 1.2],
            ['nama' => 'National', 'model' => 'SRC-560', 'harga' => 400, 'garansi' => 4, 'watt' => 370, 'kapasitas' => 1.5],
            ['nama' => 'Mitochiba', 'model' => 'CH-500B', 'harga' => 360, 'garansi' => 4, 'watt' => 380, 'kapasitas' => 1.5],
            ['nama' => 'Tefal', 'model' => 'RK1041', 'harga' => 1100000, 'garansi' => 7, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Russell Hobbs', 'model' => 'RH-21210-D', 'harga' => 1500000, 'garansi' => 7, 'watt' => 480, 'kapasitas' => 1.8],
            ['nama' => 'Zojirushi', 'model' => 'NS-RPC10', 'harga' => 2300000, 'garansi' => 8, 'watt' => 490, 'kapasitas' => 1.5],
            ['nama' => 'Idealife', 'model' => 'IL-208', 'harga' => 280, 'garansi' => 3, 'watt' => 350, 'kapasitas' => 1.2],
            ['nama' => 'Cosmos', 'model' => 'CRJ-2801', 'harga' => 450, 'garansi' => 5, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'Sharp', 'model' => 'KSR 23ST', 'harga' => 575, 'garansi' => 5, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Kirin', 'model' => 'KRC-120', 'harga' => 450, 'garansi' => 4, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Philips', 'model' => 'HD3128', 'harga' => 950, 'garansi' => 6, 'watt' => 430, 'kapasitas' => 2.0],
            ['nama' => 'Panasonic', 'model' => 'SR-DF181', 'harga' => 1300000, 'garansi' => 7, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Electrolux', 'model' => 'ERC-2205', 'harga' => 850, 'garansi' => 6, 'watt' => 430, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-350', 'harga' => 1150000, 'garansi' => 6, 'watt' => 510, 'kapasitas' => 2.0],
            ['nama' => 'Denpoo', 'model' => 'SC-37A', 'harga' => 375, 'garansi' => 3, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-330', 'harga' => 510, 'garansi' => 4, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Mito', 'model' => 'R3', 'harga' => 310, 'garansi' => 3, 'watt' => 330, 'kapasitas' => 1.2],
            ['nama' => 'Yong Ma', 'model' => 'MC-4500D', 'harga' => 890, 'garansi' => 6, 'watt' => 460, 'kapasitas' => 2.2],
            ['nama' => 'Cosmos', 'model' => 'CRJ-2501', 'harga' => 480, 'garansi' => 5, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Turbo', 'model' => 'CRL-505', 'harga' => 775, 'garansi' => 6, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'BOLDe', 'model' => 'Crystal Cook', 'harga' => 320, 'garansi' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'Polytron', 'model' => 'PRC-125', 'harga' => 425, 'garansi' => 4, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Mitochiba', 'model' => 'CH-300', 'harga' => 335, 'garansi' => 4, 'watt' => 370, 'kapasitas' => 1.5],
            ['nama' => 'Philips', 'model' => 'HD3126/33', 'harga' => 920, 'garansi' => 6, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'Zojirushi', 'model' => 'NP-NVC18', 'harga' => 2500000, 'garansi' => 10, 'watt' => 650, 'kapasitas' => 1.8],
            ['nama' => 'Panasonic', 'model' => 'SR-CN108', 'harga' => 1200000, 'garansi' => 7, 'watt' => 480, 'kapasitas' => 1.5],
            ['nama' => 'Tiger', 'model' => 'JAX-R10U', 'harga' => 1550000, 'garansi' => 8, 'watt' => 460, 'kapasitas' => 1.0],
            ['nama' => 'Tefal', 'model' => 'RK812', 'harga' => 1350000, 'garansi' => 7, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Kirin', 'model' => 'KRC-115', 'harga' => 365, 'garansi' => 4, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'National', 'model' => 'SRC-880', 'harga' => 410, 'garansi' => 5, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Denpoo', 'model' => 'SC-39C', 'harga' => 390, 'garansi' => 4, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Sharp', 'model' => 'KSR 31ST', 'harga' => 580, 'garansi' => 5, 'watt' => 430, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-460', 'harga' => 1300000, 'garansi' => 7, 'watt' => 510, 'kapasitas' => 2.0],
            ['nama' => 'Cosmos', 'model' => 'CRJ-5001', 'harga' => 510, 'garansi' => 5, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Miyako', 'model' => 'PSG-705', 'harga' => 340, 'garansi' => 3, 'watt' => 370, 'kapasitas' => 1.2],
            ['nama' => 'Sanken', 'model' => 'SJ-900', 'harga' => 470, 'garansi' => 5, 'watt' => 450, 'kapasitas' => 1.5],
            ['nama' => 'Yong Ma', 'model' => 'MC-4500', 'harga' => 920, 'garansi' => 6, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'BOLDe', 'model' => 'Super Eco Cook', 'harga' => 340, 'garansi' => 4, 'watt' => 390, 'kapasitas' => 1.5],
            ['nama' => 'Mito', 'model' => 'R6', 'harga' => 315, 'garansi' => 3, 'watt' => 350, 'kapasitas' => 1.2],
            ['nama' => 'Panasonic', 'model' => 'SR-JQ105', 'harga' => 1100000, 'garansi' => 7, 'watt' => 460, 'kapasitas' => 1.0],
            ['nama' => 'Philips', 'model' => 'HD3038', 'harga' => 1350000, 'garansi' => 6, 'watt' => 600, 'kapasitas' => 2.0],
            ['nama' => 'Denpoo', 'model' => 'SC-21', 'harga' => 290, 'garansi' => 3, 'watt' => 320, 'kapasitas' => 1.2],
            ['nama' => 'Cosmos', 'model' => 'CRJ-2038', 'harga' => 480, 'garansi' => 5, 'watt' => 400, 'kapasitas' => 2.0],
            ['nama' => 'Oxone', 'model' => 'OX-253', 'harga' => 1200000, 'garansi' => 6, 'watt' => 510, 'kapasitas' => 1.8],
            ['nama' => 'Zojirushi', 'model' => 'NP-HBC10', 'harga' => 2500000, 'garansi' => 10, 'watt' => 500, 'kapasitas' => 1.0],
            ['nama' => 'Miyako', 'model' => 'PSG-607', 'harga' => 310, 'garansi' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'Turbo', 'model' => 'CRL 300', 'harga' => 710, 'garansi' => 5, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-130D', 'harga' => 520, 'garansi' => 5, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'Polytron', 'model' => 'PRC-121', 'harga' => 450, 'garansi' => 4, 'watt' => 390, 'kapasitas' => 1.8],
            ['nama' => 'Sharp', 'model' => 'KS-N18IH', 'harga' => 1600000, 'garansi' => 8, 'watt' => 550, 'kapasitas' => 1.8],
            ['nama' => 'Idealife', 'model' => 'IL-217', 'harga' => 300, 'garansi' => 3, 'watt' => 370, 'kapasitas' => 1.5],
            ['nama' => 'Panasonic', 'model' => 'SR-DF181W', 'harga' => 1250000, 'garansi' => 7, 'watt' => 460, 'kapasitas' => 1.8],
            ['nama' => 'Russell Hobbs', 'model' => 'RH-22700-56', 'harga' => 1550000, 'garansi' => 8, 'watt' => 480, 'kapasitas' => 2.0],
            ['nama' => 'Cosmos', 'model' => 'CRJ-2201', 'harga' => 370, 'garansi' => 4, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-200', 'harga' => 390, 'garansi' => 4, 'watt' => 390, 'kapasitas' => 1.8],
            ['nama' => 'Kirin', 'model' => 'KRC-126', 'harga' => 390, 'garansi' => 4, 'watt' => 380, 'kapasitas' => 1.2],
            ['nama' => 'Maspion', 'model' => 'MRJ-197', 'harga' => 330, 'garansi' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'BOLDe', 'model' => 'Super Deluxe Cook', 'harga' => 340, 'garansi' => 4, 'watt' => 350, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-456', 'harga' => 1100000, 'garansi' => 6, 'watt' => 470, 'kapasitas' => 1.5],
            ['nama' => 'Zojirushi', 'model' => 'NS-TSQ10', 'harga' => 2200000, 'garansi' => 8, 'watt' => 430, 'kapasitas' => 1.0],
            ['nama' => 'Tiger', 'model' => 'JKT-S10U', 'harga' => 1600000, 'garansi' => 7, 'watt' => 470, 'kapasitas' => 1.0],
            ['nama' => 'Electrolux', 'model' => 'ERC-2403', 'harga' => 790, 'garansi' => 6, 'watt' => 440, 'kapasitas' => 1.8],
            ['nama' => 'Philips', 'model' => 'HD3030/30', 'harga' => 1150000, 'garansi' => 6, 'watt' => 460, 'kapasitas' => 1.5],
            ['nama' => 'Miyako', 'model' => 'PSG-605', 'harga' => 305, 'garansi' => 3, 'watt' => 360, 'kapasitas' => 1.2],
            ['nama' => 'Sharp', 'model' => 'KSR19SN', 'harga' => 500, 'garansi' => 5, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Idealife', 'model' => 'IL-213', 'harga' => 280, 'garansi' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'Panasonic', 'model' => 'SR-ZX185W', 'harga' => 1350000, 'garansi' => 8, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Yong Ma', 'model' => 'MC-2500', 'harga' => 700, 'garansi' => 6, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'National', 'model' => 'SRC-900', 'harga' => 460, 'garansi' => 5, 'watt' => 400, 'kapasitas' => 1.5],
            ['nama' => 'Cosmos', 'model' => 'CRJ-2002', 'harga' => 420, 'garansi' => 4, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Mito', 'model' => 'R7', 'harga' => 330, 'garansi' => 3, 'watt' => 370, 'kapasitas' => 1.8],
            ['nama' => 'Tefal', 'model' => 'RK202', 'harga' => 1100000, 'garansi' => 6, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Turbo', 'model' => 'CRL 600', 'harga' => 830, 'garansi' => 6, 'watt' => 500, 'kapasitas' => 2.0],
            ['nama' => 'Zojirushi', 'model' => 'NS-ZCC18', 'harga' => 2100000, 'garansi' => 10, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Russell Hobbs', 'model' => 'RH-23520', 'harga' => 1450000, 'garansi' => 8, 'watt' => 460, 'kapasitas' => 1.5],
            ['nama' => 'Denpoo', 'model' => 'SC-24', 'harga' => 295, 'garansi' => 3, 'watt' => 320, 'kapasitas' => 1.2],
            ['nama' => 'Polytron', 'model' => 'PRC-123', 'harga' => 380, 'garansi' => 4, 'watt' => 380, 'kapasitas' => 1.5],
            ['nama' => 'Kirin', 'model' => 'KRC-120SS', 'harga' => 420, 'garansi' => 5, 'watt' => 370, 'kapasitas' => 1.8],
            ['nama' => 'Cosmos', 'model' => 'CRJ-328', 'harga' => 450, 'garansi' => 4, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'Maspion', 'model' => 'MRJ-228', 'harga' => 365, 'garansi' => 4, 'watt' => 360, 'kapasitas' => 1.2],
            ['nama' => 'Idealife', 'model' => 'IL-214', 'harga' => 270, 'garansi' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'Panasonic', 'model' => 'SR-ZX205', 'harga' => 1150000, 'garansi' => 8, 'watt' => 450, 'kapasitas' => 2.0],
            ['nama' => 'Philips', 'model' => 'HD3127', 'harga' => 900, 'garansi' => 5, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'Turbo', 'model' => 'CRL 800', 'harga' => 950, 'garansi' => 6, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-355', 'harga' => 1250000, 'garansi' => 7, 'watt' => 510, 'kapasitas' => 1.8]
        ];


        // Use insertGetId if handling individual rows, or insert and then fetch inserted IDs for batch processing
        $insertedIds = [];
        foreach ($data as $row) {
            $alternative = Alternative::create($row);
            $alternative->update(['gambar' => $row['nama'] . "_" . $row['model'] . ".jpg"]);
            $insertedIds[] = $alternative->id;
        }
    }
}
