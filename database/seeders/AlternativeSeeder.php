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
            ['nama' => 'Gaboor', 'model' => 'RC50M - BE01A', 'harga' => 250000, 'dayatahan' => 3, 'watt' => 400, 'kapasitas' => 2.2],
            ['nama' => 'Philips', 'model' => 'HD3115', 'harga' => 500000, 'dayatahan' => 5, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Panasonic', 'model' => 'SR-CEZ18', 'harga' => 700000, 'dayatahan' => 4, 'watt' => 350, 'kapasitas' => 1.8],
            ['nama' => 'Cosmos', 'model' => 'CRJ-6601', 'harga' => 350000, 'dayatahan' => 3, 'watt' => 300, 'kapasitas' => 1.2],
            ['nama' => 'Sharp', 'model' => 'KS-T18TL', 'harga' => 850000, 'dayatahan' => 6, 'watt' => 360, 'kapasitas' => 2],
            ['nama' => 'Zojirushi', 'model' => 'NS-ZLH18', 'harga' => 1200000, 'dayatahan' => 7, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Yong Ma', 'model' => 'MC-3900', 'harga' => 600000, 'dayatahan' => 4, 'watt' => 310, 'kapasitas' => 1.5],
            ['nama' => 'Midea', 'model' => 'MB-FS5017', 'harga' => 750000, 'dayatahan' => 5, 'watt' => 420, 'kapasitas' => 2],
            ['nama' => 'Toshiba', 'model' => 'RC-18NT', 'harga' => 900000, 'dayatahan' => 6, 'watt' => 370, 'kapasitas' => 1.8],
            ['nama' => 'Electrolux', 'model' => 'ERC6503W', 'harga' => 1100000, 'dayatahan' => 6, 'watt' => 440, 'kapasitas' => 1.8],
            ['nama' => 'Maimete ', 'model' => 'MT-99E', 'harga' => 200000, 'dayatahan' => 2, 'watt' => 200, 'kapasitas' => 1.5],
            ['nama' => 'Sanken', 'model' => 'SJ-150', 'harga' => 507000, 'dayatahan' => 5, 'watt' => 350, 'kapasitas' => 1.2],
            ['nama' => 'Sanken', 'model' => 'SJ-2200', 'harga' => 558000, 'dayatahan' => 5, 'watt' => 350, 'kapasitas' => 2],
            ['nama' => 'Sanken', 'model' => 'SJ-120SP', 'harga' => 414000, 'dayatahan' => 3, 'watt' => 300, 'kapasitas' => 1],
            ['nama' => 'Sanken', 'model' => 'SJ-2060', 'harga' => 490000, 'dayatahan' => 4, 'watt' => 350, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-1999', 'harga' => 630000, 'dayatahan' => 5, 'watt' => 350, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-3000', 'harga' => 669000, 'dayatahan' => 6, 'watt' => 350, 'kapasitas' => 2],
            ['nama' => 'Miyako', 'model' => 'MCM-612', 'harga' => 226500, 'dayatahan' => 4, 'watt' => 365, 'kapasitas' => 1.2],
            ['nama' => 'Miyako', 'model' => 'MCM-528', 'harga' => 227000, 'dayatahan' => 5, 'watt' => 395, 'kapasitas' => 1.8],
            ['nama' => 'Miyako', 'model' => 'MCM-606A', 'harga' => 199500, 'dayatahan' => 2, 'watt' => 300, 'kapasitas' => 1.8],
            ['nama' => 'Miyako', 'model' => 'MCM-508 SBC', 'harga' => 228000, 'dayatahan' => 3, 'watt' => 395, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-2000', 'harga' => 450000, 'dayatahan' => 4, 'watt' => 300, 'kapasitas' => 1.5],
            ['nama' => 'Hitachi', 'model' => 'RZ-D18F', 'harga' => 1000000, 'dayatahan' => 8, 'watt' => 600, 'kapasitas' => 1.8],
            ['nama' => 'Maspion', 'model' => 'MRJ-180', 'harga' => 350000, 'dayatahan' => 3, 'watt' => 280, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-200', 'harga' => 1300000, 'dayatahan' => 6, 'watt' => 500, 'kapasitas' => 2.0],
            ['nama' => 'Kirin', 'model' => 'KRC-389', 'harga' => 500000, 'dayatahan' => 5, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Black & Decker', 'model' => 'RC650', 'harga' => 900000, 'dayatahan' => 6, 'watt' => 440, 'kapasitas' => 1.8],
            ['nama' => 'Modena', 'model' => 'CR 1500', 'harga' => 1500000, 'dayatahan' => 7, 'watt' => 480, 'kapasitas' => 2.0],
            ['nama' => 'Tiger', 'model' => 'JNP-1800', 'harga' => 1700000, 'dayatahan' => 8, 'watt' => 600, 'kapasitas' => 1.8],
            ['nama' => 'Pigeon', 'model' => 'Joy Rice Cooker', 'harga' => 400000, 'dayatahan' => 3, 'watt' => 350, 'kapasitas' => 1.2],
            ['nama' => 'Tefal', 'model' => 'RK1028', 'harga' => 950000, 'dayatahan' => 6, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Denpoo', 'model' => 'SC-28B', 'harga' => 350, 'dayatahan' => 3, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'National', 'model' => 'SRC-520', 'harga' => 375, 'dayatahan' => 4, 'watt' => 380, 'kapasitas' => 2.0],
            ['nama' => 'Zojirushi', 'model' => 'NS-ZCC18', 'harga' => 2100000, 'dayatahan' => 8, 'watt' => 650, 'kapasitas' => 1.8],
            ['nama' => 'Midea', 'model' => 'MB-FS5015', 'harga' => 650, 'dayatahan' => 5, 'watt' => 500, 'kapasitas' => 1.5],
            ['nama' => 'Philips', 'model' => 'HD3132', 'harga' => 1150000, 'dayatahan' => 7, 'watt' => 450, 'kapasitas' => 2.0],
            ['nama' => 'Panasonic', 'model' => 'SR-ZX105', 'harga' => 2000000, 'dayatahan' => 8, 'watt' => 580, 'kapasitas' => 1.5],
            ['nama' => 'Electrolux', 'model' => 'ERC3505', 'harga' => 850, 'dayatahan' => 6, 'watt' => 430, 'kapasitas' => 1.8],
            ['nama' => 'Russell Hobbs', 'model' => 'RH-21210', 'harga' => 1400000, 'dayatahan' => 7, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Toshiba', 'model' => 'RC-5SLN', 'harga' => 1100000, 'dayatahan' => 6, 'watt' => 400, 'kapasitas' => 1.0],
            ['nama' => 'Tiger', 'model' => 'JBV-S10U', 'harga' => 1500000, 'dayatahan' => 7, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Yong Ma', 'model' => 'MC-3500', 'harga' => 750, 'dayatahan' => 6, 'watt' => 460, 'kapasitas' => 2.0],
            ['nama' => 'Philips', 'model' => 'HD3129', 'harga' => 900, 'dayatahan' => 6, 'watt' => 500, 'kapasitas' => 2.2],
            ['nama' => 'Sharp', 'model' => 'KS-N18MG', 'harga' => 500, 'dayatahan' => 5, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Panasonic', 'model' => 'SR-TEM18', 'harga' => 1050000, 'dayatahan' => 7, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Midea', 'model' => 'MB-FS5018', 'harga' => 770, 'dayatahan' => 5, 'watt' => 400, 'kapasitas' => 2.0],
            ['nama' => 'Tefal', 'model' => 'RK5001', 'harga' => 1250000, 'dayatahan' => 7, 'watt' => 530, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-5000', 'harga' => 430, 'dayatahan' => 4, 'watt' => 380, 'kapasitas' => 1.5],
            ['nama' => 'Oxone', 'model' => 'OX-214', 'harga' => 1150000, 'dayatahan' => 6, 'watt' => 520, 'kapasitas' => 2.0],
            ['nama' => 'Kirin', 'model' => 'KRC-390', 'harga' => 550, 'dayatahan' => 5, 'watt' => 390, 'kapasitas' => 1.8],
            ['nama' => 'Denpoo', 'model' => 'SC-28B Digital', 'harga' => 480, 'dayatahan' => 4, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'National', 'model' => 'SRC-660', 'harga' => 390, 'dayatahan' => 4, 'watt' => 370, 'kapasitas' => 1.5],
            ['nama' => 'Mitochiba', 'model' => 'CH-200', 'harga' => 520, 'dayatahan' => 5, 'watt' => 360, 'kapasitas' => 2.0],
            ['nama' => 'Ichiko', 'model' => 'RC-18', 'harga' => 450, 'dayatahan' => 4, 'watt' => 350, 'kapasitas' => 1.8],
            ['nama' => 'Idealife', 'model' => 'IL-213', 'harga' => 630, 'dayatahan' => 6, 'watt' => 450, 'kapasitas' => 2.2],
            ['nama' => 'Advance', 'model' => 'ARC-180', 'harga' => 400, 'dayatahan' => 4, 'watt' => 380, 'kapasitas' => 1.5],
            ['nama' => 'Sanken', 'model' => 'SJ-300', 'harga' => 470, 'dayatahan' => 4, 'watt' => 390, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-316', 'harga' => 1250000, 'dayatahan' => 7, 'watt' => 550, 'kapasitas' => 2.0],
            ['nama' => 'Tefal', 'model' => 'RK1045', 'harga' => 1000000, 'dayatahan' => 6, 'watt' => 530, 'kapasitas' => 1.8],
            ['nama' => 'Polytron', 'model' => 'PRC-501', 'harga' => 400, 'dayatahan' => 5, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'BOLDe', 'model' => 'Super Cook', 'harga' => 350, 'dayatahan' => 4, 'watt' => 400, 'kapasitas' => 1.2],
            ['nama' => 'Cosmos', 'model' => 'CRJ-3301', 'harga' => 370, 'dayatahan' => 5, 'watt' => 390, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-202', 'harga' => 450, 'dayatahan' => 5, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Maspion', 'model' => 'MRJ-208', 'harga' => 325, 'dayatahan' => 4, 'watt' => 360, 'kapasitas' => 1.5],
            ['nama' => 'Mito', 'model' => 'R2', 'harga' => 320, 'dayatahan' => 3, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Philips', 'model' => 'HD3132/33', 'harga' => 1000000, 'dayatahan' => 7, 'watt' => 400, 'kapasitas' => 2.0],
            ['nama' => 'Miyako', 'model' => 'MCM-609', 'harga' => 285, 'dayatahan' => 3, 'watt' => 330, 'kapasitas' => 1.2],
            ['nama' => 'Sharp', 'model' => 'KSR19ST', 'harga' => 550, 'dayatahan' => 5, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Idealife', 'model' => 'IL-210S', 'harga' => 330, 'dayatahan' => 4, 'watt' => 370, 'kapasitas' => 1.5],
            ['nama' => 'Bolde', 'model' => 'Super Cook Plus', 'harga' => 280, 'dayatahan' => 3, 'watt' => 350, 'kapasitas' => 1.2],
            ['nama' => 'Turbo', 'model' => 'CRL 1500', 'harga' => 800, 'dayatahan' => 6, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Yong Ma', 'model' => 'MC-1500', 'harga' => 700, 'dayatahan' => 5, 'watt' => 430, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-130', 'harga' => 310, 'dayatahan' => 4, 'watt' => 340, 'kapasitas' => 1.2],
            ['nama' => 'Philips', 'model' => 'HD3119/33', 'harga' => 950, 'dayatahan' => 6, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Mitochiba', 'model' => 'CH-500', 'harga' => 370, 'dayatahan' => 5, 'watt' => 390, 'kapasitas' => 1.5],
            ['nama' => 'Cosmos', 'model' => 'CRJ-6606', 'harga' => 450, 'dayatahan' => 5, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Polytron', 'model' => 'PRC-1901', 'harga' => 550, 'dayatahan' => 5, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Denpoo', 'model' => 'SC-23D', 'harga' => 270, 'dayatahan' => 3, 'watt' => 300, 'kapasitas' => 1.8],
            ['nama' => 'Cosmos', 'model' => 'CRJ-323', 'harga' => 370, 'dayatahan' => 4, 'watt' => 390, 'kapasitas' => 1.5],
            ['nama' => 'Maspion', 'model' => 'MRJ-205', 'harga' => 420, 'dayatahan' => 5, 'watt' => 360, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-203', 'harga' => 430, 'dayatahan' => 4, 'watt' => 400, 'kapasitas' => 2.0],
            ['nama' => 'BOLDe', 'model' => 'Super Cook Pro', 'harga' => 340, 'dayatahan' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'Mito', 'model' => 'R5', 'harga' => 410, 'dayatahan' => 4, 'watt' => 370, 'kapasitas' => 1.8],
            ['nama' => 'Philips', 'model' => 'HD3115/33', 'harga' => 980, 'dayatahan' => 6, 'watt' => 420, 'kapasitas' => 2.0],
            ['nama' => 'Panasonic', 'model' => 'SR-GA421', 'harga' => 1250000, 'dayatahan' => 8, 'watt' => 520, 'kapasitas' => 2.2],
            ['nama' => 'Sharp', 'model' => 'KS-TH18', 'harga' => 700, 'dayatahan' => 5, 'watt' => 460, 'kapasitas' => 1.8],
            ['nama' => 'Turbo', 'model' => 'CRL 500', 'harga' => 750, 'dayatahan' => 6, 'watt' => 450, 'kapasitas' => 2.0],
            ['nama' => 'Yong Ma', 'model' => 'MC-3500D', 'harga' => 880, 'dayatahan' => 6, 'watt' => 420, 'kapasitas' => 2.0],
            ['nama' => 'Sanken', 'model' => 'SJ-450', 'harga' => 290, 'dayatahan' => 3, 'watt' => 380, 'kapasitas' => 1.2],
            ['nama' => 'Miyako', 'model' => 'MCM-508', 'harga' => 325, 'dayatahan' => 3, 'watt' => 320, 'kapasitas' => 1.2],
            ['nama' => 'National', 'model' => 'SRC-560', 'harga' => 400, 'dayatahan' => 4, 'watt' => 370, 'kapasitas' => 1.5],
            ['nama' => 'Mitochiba', 'model' => 'CH-500B', 'harga' => 360, 'dayatahan' => 4, 'watt' => 380, 'kapasitas' => 1.5],
            ['nama' => 'Tefal', 'model' => 'RK1041', 'harga' => 1100000, 'dayatahan' => 7, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Russell Hobbs', 'model' => 'RH-21210-D', 'harga' => 1500000, 'dayatahan' => 7, 'watt' => 480, 'kapasitas' => 1.8],
            ['nama' => 'Zojirushi', 'model' => 'NS-RPC10', 'harga' => 2300000, 'dayatahan' => 8, 'watt' => 490, 'kapasitas' => 1.5],
            ['nama' => 'Idealife', 'model' => 'IL-208', 'harga' => 280, 'dayatahan' => 3, 'watt' => 350, 'kapasitas' => 1.2],
            ['nama' => 'Cosmos', 'model' => 'CRJ-2801', 'harga' => 450, 'dayatahan' => 5, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'Sharp', 'model' => 'KSR 23ST', 'harga' => 575, 'dayatahan' => 5, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Kirin', 'model' => 'KRC-120', 'harga' => 450, 'dayatahan' => 4, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Philips', 'model' => 'HD3128', 'harga' => 950, 'dayatahan' => 6, 'watt' => 430, 'kapasitas' => 2.0],
            ['nama' => 'Panasonic', 'model' => 'SR-DF181', 'harga' => 1300000, 'dayatahan' => 7, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Electrolux', 'model' => 'ERC-2205', 'harga' => 850, 'dayatahan' => 6, 'watt' => 430, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-350', 'harga' => 1150000, 'dayatahan' => 6, 'watt' => 510, 'kapasitas' => 2.0],
            ['nama' => 'Denpoo', 'model' => 'SC-37A', 'harga' => 375, 'dayatahan' => 3, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-330', 'harga' => 510, 'dayatahan' => 4, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Mito', 'model' => 'R3', 'harga' => 310, 'dayatahan' => 3, 'watt' => 330, 'kapasitas' => 1.2],
            ['nama' => 'Yong Ma', 'model' => 'MC-4500D', 'harga' => 890, 'dayatahan' => 6, 'watt' => 460, 'kapasitas' => 2.2],
            ['nama' => 'Cosmos', 'model' => 'CRJ-2501', 'harga' => 480, 'dayatahan' => 5, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Turbo', 'model' => 'CRL-505', 'harga' => 775, 'dayatahan' => 6, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'BOLDe', 'model' => 'Crystal Cook', 'harga' => 320, 'dayatahan' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'Polytron', 'model' => 'PRC-125', 'harga' => 425, 'dayatahan' => 4, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Mitochiba', 'model' => 'CH-300', 'harga' => 335, 'dayatahan' => 4, 'watt' => 370, 'kapasitas' => 1.5],
            ['nama' => 'Philips', 'model' => 'HD3126/33', 'harga' => 920, 'dayatahan' => 6, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'Zojirushi', 'model' => 'NP-NVC18', 'harga' => 2500000, 'dayatahan' => 10, 'watt' => 650, 'kapasitas' => 1.8],
            ['nama' => 'Panasonic', 'model' => 'SR-CN108', 'harga' => 1200000, 'dayatahan' => 7, 'watt' => 480, 'kapasitas' => 1.5],
            ['nama' => 'Tiger', 'model' => 'JAX-R10U', 'harga' => 1550000, 'dayatahan' => 8, 'watt' => 460, 'kapasitas' => 1.0],
            ['nama' => 'Tefal', 'model' => 'RK812', 'harga' => 1350000, 'dayatahan' => 7, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Kirin', 'model' => 'KRC-115', 'harga' => 365, 'dayatahan' => 4, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'National', 'model' => 'SRC-880', 'harga' => 410, 'dayatahan' => 5, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Denpoo', 'model' => 'SC-39C', 'harga' => 390, 'dayatahan' => 4, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Sharp', 'model' => 'KSR 31ST', 'harga' => 580, 'dayatahan' => 5, 'watt' => 430, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-460', 'harga' => 1300000, 'dayatahan' => 7, 'watt' => 510, 'kapasitas' => 2.0],
            ['nama' => 'Cosmos', 'model' => 'CRJ-5001', 'harga' => 510, 'dayatahan' => 5, 'watt' => 400, 'kapasitas' => 1.8],
            ['nama' => 'Miyako', 'model' => 'PSG-705', 'harga' => 340, 'dayatahan' => 3, 'watt' => 370, 'kapasitas' => 1.2],
            ['nama' => 'Sanken', 'model' => 'SJ-900', 'harga' => 470, 'dayatahan' => 5, 'watt' => 450, 'kapasitas' => 1.5],
            ['nama' => 'Yong Ma', 'model' => 'MC-4500', 'harga' => 920, 'dayatahan' => 6, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'BOLDe', 'model' => 'Super Eco Cook', 'harga' => 340, 'dayatahan' => 4, 'watt' => 390, 'kapasitas' => 1.5],
            ['nama' => 'Mito', 'model' => 'R6', 'harga' => 315, 'dayatahan' => 3, 'watt' => 350, 'kapasitas' => 1.2],
            ['nama' => 'Panasonic', 'model' => 'SR-JQ105', 'harga' => 1100000, 'dayatahan' => 7, 'watt' => 460, 'kapasitas' => 1.0],
            ['nama' => 'Philips', 'model' => 'HD3038', 'harga' => 1350000, 'dayatahan' => 6, 'watt' => 600, 'kapasitas' => 2.0],
            ['nama' => 'Denpoo', 'model' => 'SC-21', 'harga' => 290, 'dayatahan' => 3, 'watt' => 320, 'kapasitas' => 1.2],
            ['nama' => 'Cosmos', 'model' => 'CRJ-2038', 'harga' => 480, 'dayatahan' => 5, 'watt' => 400, 'kapasitas' => 2.0],
            ['nama' => 'Oxone', 'model' => 'OX-253', 'harga' => 1200000, 'dayatahan' => 6, 'watt' => 510, 'kapasitas' => 1.8],
            ['nama' => 'Zojirushi', 'model' => 'NP-HBC10', 'harga' => 2500000, 'dayatahan' => 10, 'watt' => 500, 'kapasitas' => 1.0],
            ['nama' => 'Miyako', 'model' => 'PSG-607', 'harga' => 310, 'dayatahan' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'Turbo', 'model' => 'CRL 300', 'harga' => 710, 'dayatahan' => 5, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-130D', 'harga' => 520, 'dayatahan' => 5, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'Polytron', 'model' => 'PRC-121', 'harga' => 450, 'dayatahan' => 4, 'watt' => 390, 'kapasitas' => 1.8],
            ['nama' => 'Sharp', 'model' => 'KS-N18IH', 'harga' => 1600000, 'dayatahan' => 8, 'watt' => 550, 'kapasitas' => 1.8],
            ['nama' => 'Idealife', 'model' => 'IL-217', 'harga' => 300, 'dayatahan' => 3, 'watt' => 370, 'kapasitas' => 1.5],
            ['nama' => 'Panasonic', 'model' => 'SR-DF181W', 'harga' => 1250000, 'dayatahan' => 7, 'watt' => 460, 'kapasitas' => 1.8],
            ['nama' => 'Russell Hobbs', 'model' => 'RH-22700-56', 'harga' => 1550000, 'dayatahan' => 8, 'watt' => 480, 'kapasitas' => 2.0],
            ['nama' => 'Cosmos', 'model' => 'CRJ-2201', 'harga' => 370, 'dayatahan' => 4, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Sanken', 'model' => 'SJ-200', 'harga' => 390, 'dayatahan' => 4, 'watt' => 390, 'kapasitas' => 1.8],
            ['nama' => 'Kirin', 'model' => 'KRC-126', 'harga' => 390, 'dayatahan' => 4, 'watt' => 380, 'kapasitas' => 1.2],
            ['nama' => 'Maspion', 'model' => 'MRJ-197', 'harga' => 330, 'dayatahan' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'BOLDe', 'model' => 'Super Deluxe Cook', 'harga' => 340, 'dayatahan' => 4, 'watt' => 350, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-456', 'harga' => 1100000, 'dayatahan' => 6, 'watt' => 470, 'kapasitas' => 1.5],
            ['nama' => 'Zojirushi', 'model' => 'NS-TSQ10', 'harga' => 2200000, 'dayatahan' => 8, 'watt' => 430, 'kapasitas' => 1.0],
            ['nama' => 'Tiger', 'model' => 'JKT-S10U', 'harga' => 1600000, 'dayatahan' => 7, 'watt' => 470, 'kapasitas' => 1.0],
            ['nama' => 'Electrolux', 'model' => 'ERC-2403', 'harga' => 790, 'dayatahan' => 6, 'watt' => 440, 'kapasitas' => 1.8],
            ['nama' => 'Philips', 'model' => 'HD3030/30', 'harga' => 1150000, 'dayatahan' => 6, 'watt' => 460, 'kapasitas' => 1.5],
            ['nama' => 'Miyako', 'model' => 'PSG-605', 'harga' => 305, 'dayatahan' => 3, 'watt' => 360, 'kapasitas' => 1.2],
            ['nama' => 'Sharp', 'model' => 'KSR19SN', 'harga' => 500, 'dayatahan' => 5, 'watt' => 420, 'kapasitas' => 1.8],
            ['nama' => 'Idealife', 'model' => 'IL-213', 'harga' => 280, 'dayatahan' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'Panasonic', 'model' => 'SR-ZX185W', 'harga' => 1350000, 'dayatahan' => 8, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Yong Ma', 'model' => 'MC-2500', 'harga' => 700, 'dayatahan' => 6, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'National', 'model' => 'SRC-900', 'harga' => 460, 'dayatahan' => 5, 'watt' => 400, 'kapasitas' => 1.5],
            ['nama' => 'Cosmos', 'model' => 'CRJ-2002', 'harga' => 420, 'dayatahan' => 4, 'watt' => 380, 'kapasitas' => 1.8],
            ['nama' => 'Mito', 'model' => 'R7', 'harga' => 330, 'dayatahan' => 3, 'watt' => 370, 'kapasitas' => 1.8],
            ['nama' => 'Tefal', 'model' => 'RK202', 'harga' => 1100000, 'dayatahan' => 6, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Turbo', 'model' => 'CRL 600', 'harga' => 830, 'dayatahan' => 6, 'watt' => 500, 'kapasitas' => 2.0],
            ['nama' => 'Zojirushi', 'model' => 'NS-ZCC18', 'harga' => 2100000, 'dayatahan' => 10, 'watt' => 450, 'kapasitas' => 1.8],
            ['nama' => 'Russell Hobbs', 'model' => 'RH-23520', 'harga' => 1450000, 'dayatahan' => 8, 'watt' => 460, 'kapasitas' => 1.5],
            ['nama' => 'Denpoo', 'model' => 'SC-24', 'harga' => 295, 'dayatahan' => 3, 'watt' => 320, 'kapasitas' => 1.2],
            ['nama' => 'Polytron', 'model' => 'PRC-123', 'harga' => 380, 'dayatahan' => 4, 'watt' => 380, 'kapasitas' => 1.5],
            ['nama' => 'Kirin', 'model' => 'KRC-120SS', 'harga' => 420, 'dayatahan' => 5, 'watt' => 370, 'kapasitas' => 1.8],
            ['nama' => 'Cosmos', 'model' => 'CRJ-328', 'harga' => 450, 'dayatahan' => 4, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'Maspion', 'model' => 'MRJ-228', 'harga' => 365, 'dayatahan' => 4, 'watt' => 360, 'kapasitas' => 1.2],
            ['nama' => 'Idealife', 'model' => 'IL-214', 'harga' => 270, 'dayatahan' => 3, 'watt' => 350, 'kapasitas' => 1.5],
            ['nama' => 'Panasonic', 'model' => 'SR-ZX205', 'harga' => 1150000, 'dayatahan' => 8, 'watt' => 450, 'kapasitas' => 2.0],
            ['nama' => 'Philips', 'model' => 'HD3127', 'harga' => 900, 'dayatahan' => 5, 'watt' => 410, 'kapasitas' => 1.8],
            ['nama' => 'Turbo', 'model' => 'CRL 800', 'harga' => 950, 'dayatahan' => 6, 'watt' => 500, 'kapasitas' => 1.8],
            ['nama' => 'Oxone', 'model' => 'OX-355', 'harga' => 1250000, 'dayatahan' => 7, 'watt' => 510, 'kapasitas' => 1.8]
        ];


        // Use insertGetId if handling individual rows, or insert and then fetch inserted IDs for batch processing
        $insertedIds = [];
        foreach ($data as $row) {
            $insertedIds[] = Alternative::create($row)->id;
        }

        // Process criteria values
        $criteriaValues = [];
        foreach ($data as $index => $row) {
            $alternativeId = $insertedIds[$index]; // Map alternative ID to the respective data row
            $criteriaValues = array_merge(
                $criteriaValues,
                $this->processCriteria($row, $alternativeId)
            );
        }

        // Insert criteria values into the Comparisons table
        Comparisons::insert($criteriaValues);
    }

    /**
     * Process criteria and return an array of values to insert into the Comparisons table.
     */
    private function processCriteria(array $requestData, $alternativeId)
    {
        $criteriaValues = [];

        foreach ($requestData as $key => $value) {
            $criteria = Criteria::where('name', $key)->first();

            if ($criteria) {
                $subCriteriaId = $this->findMatchingSubCriteria($criteria->id, $value);

                if ($subCriteriaId) {
                    $criteriaValues[] = [
                        'alternative_id' => $alternativeId,
                        'sub_criteria_id' => $subCriteriaId,
                    ];
                }
            }
        }

        return $criteriaValues;
    }

    /**
     * Find the matching SubCriteria ID based on criteria and value.
     */
    private function findMatchingSubCriteria($criteriaId, $value)
    {
        return SubCriteria::where('criteria_id', $criteriaId)
            ->where(function ($query) use ($value) {
                $query->where(function ($subQuery) use ($value) {
                    $subQuery->where('operator', '<=')->where('value', '<=', $value);
                })->orWhere(function ($subQuery) use ($value) {
                    $subQuery->where('operator', '>=')
                        ->where('value', '>=', $value);
                });
            })
            ->value('id') ?? null;
    }
}
