<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationZone;
use App\Models\Province;

class EducationZoneSeeder extends Seeder
{
    public function run(): void
    {
        $zones = [
            // ================= NORTHERN =================
            'Northern Province' => [
                'Islands Zone',
                'Jaffna Zone',
                'Thenmarachchi Zone',
                'Vadamarachchi Zone',
                'Valikama Zone',
                'Madhu Zone',
                'Mannar Zone',
                'Vavuniya South Zone',
                'Vavuniya North Zone',
                'Mullaitivu Zone',
                'Thunukkai Zone',
                'Kilinochi Zone',
            ],

            // ================= EASTERN =================
            'Eastern Province' => [
                'Batticaloa Zone',
                'Batticaloa Central Zone',
                'Batticaloa West Zone',
                'Kalkudah Zone',
                'Paddiruppu Zone',
                'Akkaraipathu Zone',
                'Ampara Zone',
                'Dehiattakandiya Zone',
                'Kalmunai Zone',
                'Mahaoya Zone',
                'Sammanthurai Zone',
                'Thirukkovil Zone',
                'Kantale Zone',
                'Kinniya Zone',
                'Muttur Zone',
                'Trincomalee Zone',
                'Trincomalee-North Zone',
            ],

            // ================= SOUTHERN =================
            'Southern Province' => [
                'Ambalangoda Zone',
                'Elpitiya Zone',
                'Galle Zone',
                'Udugama Zone',
                'Akuressa Zone',
                'Matara Zone',
                'Morawaka Zone',
                'Mulatiyana (Hakmana) Zone',
                'Hambantota Zone',
                'Tangalle Zone',
                'Walasmulla Zone',
            ],

            // ================= WESTERN =================
            'Western Province' => [
                'Colombo Zone',
                'Homagama Zone',
                'Piliyandala Zone',
                'Sri Jayawardanapura Zone',
                'Gampaha Zone',
                'Kelaniya Zone',
                'Minuwangoda Zone',
                'Negombo Zone',
                'Horana Zone',
                'Kalutara Zone',
                'Matugama Zone',
            ],

            // ================= CENTRAL =================
            'Central Province' => [
                'Denuwara Zone',
                'Gampola Zone',
                'Kandy Zone',
                'Katugastota Zone',
                'Teldeniya Zone',
                'Wattegama Zone',
                'Galewala Zone',
                'Matale Zone',
                'Naula Zone',
                'Wilgamuwa Zone',
                'Hanguranketha Zone',
                'Hatton Zone',
                'Kotmale Zone',
                'Nuwara Eliya Zone',
                'Walapane Zone',
            ],

            // ================= UVA =================
            'Uva Province' => [
                'Badulla Zone',
                'Bandarawela Zone',
                'Mahiyanganaya Zone',
                'Passara Zone',
                'Viyulawa Zone',
                'Welimada Zone',
                'Bibile Zone',
                'Moneragala Zone',
                'Thanamalwila Zone',
                'Wellawaya Zone',
            ],

            // ================= SABARAGAMUWA =================
            'Sabaragamuva Province' => [
                'Balangoda Zone',
                'Embilipitiya Zone',
                'Nivitigala Zone',
                'Ratnapura Zone',
                'Dehiowita Zone',
                'Kegalle Zone',
                'Mawanella Zone',
            ],

            // ================= NORTH CENTRAL =================
            'North Central Province' => [
                'Anuradhapura Zone',
                'Galenbindunuwewa Zone',
                'Kebithigollewa Zone',
                'Kekirawa Zone',
                'Thambuttegama Zone',
                'Dimbulagala Zone',
                'Hingurakgoda Zone',
                'Polonnaruwa Zone',
            ],

            // ================= NORTH WESTERN =================
            'North Western Province' => [
                'Giriulla Zone',
                'Ibbagamuwa Zone',
                'Kuliyapitiya Zone',
                'Kurunegala Zone',
                'Maho Zone',
                'Nikaweratiya Zone',
                'Chilaw Zone',
                'Puttalam Zone',
            ],
        ];

        foreach ($zones as $provinceName => $zoneNames) {

            $province = Province::whereRaw('LOWER(province_name) = ?', [strtolower($provinceName)])->first();

            if (!$province) {
                $this->command->warn("Province not found: {$provinceName}");
                continue; // skip this province
            }


            foreach ($zoneNames as $zoneName) {
                EducationZone::firstOrCreate(
                    ['zone_name' => $zoneName],       // search by zone_name
                    [
                        'province_id' => $province->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }
}
