<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EducationDivision;
use App\Models\EducationZone;

class EducationDivisionSeeder extends Seeder
{
    public function run(): void
    {
        $divisions = [

            /* ================= NORTHERN PROVINCE ================= */

            'Islands Zone' => [
                'Delft',
                'Karainagar',
                'Kayts',
                'Velanai'
            ],

            'Jaffna Zone' => [
                'Jaffna',
                'Kopay',
                'Nallur'
            ],

            'Thenmarachchi Zone' => [
                'Chavakachcheri'
            ],

            'Vadamarachchi Zone' => [
                'Karaveddy',
                'Maruthankerny',
                'Point Pedro'
            ],

            'Valikama Zone' => [
                'Chankanai',
                'Sandilipay',
                'Tellipalai',
                'Uduvil'
            ],

            'Madhu Zone' => [
                'Madhu',
                'Manthai West'
            ],

            'Mannar Zone' => [
                'Mannar',
                'Musali',
                'Nanattan'
            ],

            'Vavuniya South Zone' => [
                'Vavuniya South-Tamil',
                'Vavuniya South-Sinhala',
                'Vengalacheddikulam'
            ],

            'Vavuniya North Zone' => [
                'Omanthai',
                'Vavuniya North'
            ],

            'Mullaitivu Zone' => [
                'Maritimepattu',
                'Puthukkudiyiruppu',
                'Welioya'
            ],

            'Thunukkai Zone' => [
                'Manthai East',
                'Oddusudan',
                'Thunukkai'
            ],

            'Kilinochi Zone' => [
                'Kandawalai',
                'Karachchi',
                'Pallai',
                'Poonakary'
            ],

            /* ================= EASTERN PROVINCE ================= */

            'Batticaloa Zone' => [
                'Eravur Pattu I - Chenkalady',
                'Manmunai North',
                'Manmunai Pattu'
            ],

            'Batticaloa Central Zone' => [
                'Eravur Town',
                'Kaththankudy',
                'Koralai Pattu West'
            ],

            'Batticaloa West Zone' => [
                'Eravur Pattu III',
                'Manmunai South West',
                'Manmunai West'
            ],

            'Kalkudah Zone' => [
                'Eravur Pattu II',
                'Koralai Pattu',
                'Koralai Pattu North'
            ],

            'Paddiruppu Zone' => [
                'Manmunai South & Eruvil',
                'Porativu Pattu'
            ],

            'Akkaraipathu Zone' => [
                'Addalachchenai',
                'Akkaraipattu',
                'Pottuvil I'
            ],

            'Ampara Zone' => [
                'Ampara',
                'Damana',
                'Lahugala',
                'Uhana'
            ],

            'Dehiattakandiya Zone' => [
                'Dehiattakandiya'
            ],

            'Kalmunai Zone' => [
                'Kalmunai',
                'Kalmunai Tamil',
                'Karaithivu',
                'Ninthavur',
                'Sainthamaruthu'
            ],

            'Mahaoya Zone' => [
                'Mahaoya',
                'Padiyatalawa'
            ],

            'Sammanthurai Zone' => [
                'Irakkamam',
                'Navithanveli',
                'Sammanthurai'
            ],

            'Thirukkovil Zone' => [
                'Alayadivembu',
                'Pottuvil II (Tamil)',
                'Thirukkovil'
            ],

            'Kantale Zone' => [
                'Kantale',
                'Seruvila'
            ],

            'Kinniya Zone' => [
                'Kinniya',
                'Kurinchakerny',
                'Mullipothana'
            ],

            'Muttur Zone' => [
                'Echchilampattu',
                'Muttur'
            ],

            'Trincomalee Zone' => [
                'Kuchchaveli',
                'Thampalakamam',
                'Trincomalee Town'
            ],

            'Trincomalee-North Zone' => [
                'Gomarankadawala',
                'Morawewa',
                'Padavi Sripura'
            ],

            /* ================= SOUTHERN PROVINCE ================= */

            'Ambalangoda Zone' => [
                'Ambalangoda',
                'Balapitiya',
                'Hikkaduwa'
            ],

            'Elpitiya Zone' => [
                'Bentota',
                'Divitura-Welivitiya',
                'Elpitiya',
                'Karandeniya',
                'Pitigala'
            ],

            'Galle Zone' => [
                'Akmeemana',
                'Baddegama',
                'Galle',
                'Habaraduwa'
            ],

            'Udugama Zone' => [
                'Mapalagama',
                'Thawalama',
                'Udugama'
            ],

            'Akuressa Zone' => [
                'Akuressa',
                'Malimboda',
                'Welipitiya'
            ],

            'Matara Zone' => [
                'Devinuwara',
                'Dikwella',
                'Matara',
                'Weligama'
            ],

            'Morawaka Zone' => [
                'Kotapola',
                'Morawaka',
                'Pasgoda'
            ],

            'Mulatiyana (Hakmana) Zone' => [
                'Hakmana',
                'Kamburupitiya',
                'Mulatiyana',
                'Thihagoda'
            ],

            'Hambantota Zone' => [
                'Ambalantota',
                'Hambantota',
                'Lunugamvehera',
                'Sooriyawewa',
                'Thissamaharama'
            ],

            'Tangalle Zone' => [
                'Angunakolapelessa',
                'Beliatta',
                'Tangalle'
            ],

            'Walasmulla Zone' => [
                'Katuwana',
                'Walasmulla'
            ],

            /* ================= WESTERN PROVINCE ================= */

            'Colombo Zone' => [
                'Borella',
                'Colombo Central',
                'Colombo North',
                'Colombo South'
            ],

            'Homagama Zone' => [
                'Hanwella',
                'Homagama',
                'Padukka'
            ],

            'Piliyandala Zone' => [
                'Dehiwala',
                'Kesbewa',
                'Moratuwa'
            ],

            'Sri Jayawardanapura Zone' => [
                'Kaduwela',
                'Kolonnawa',
                'Maharagama',
                'Nugegoda'
            ],

            'Gampaha Zone' => [
                'Attanagalla',
                'Dompe',
                'Gampaha'
            ],

            'Kelaniya Zone' => [
                'Biyagama',
                'Kelaniya',
                'Mahara',
                'Wattala'
            ],

            'Minuwangoda Zone' => [
                'Divulapitiya',
                'Meerigama',
                'Minuwangoda'
            ],

            'Negombo Zone' => [
                'Ja-Ela',
                'Katana',
                'Negombo'
            ],

            'Horana Zone' => [
                'Bandaragama',
                'Bulathsinhala',
                'Horana'
            ],

            'Kalutara Zone' => [
                'Beruwala',
                'Dodangoda',
                'Kalutara',
                'Panadura'
            ],

            'Matugama Zone' => [
                'Agalawatta',
                'Matugama',
                'Palindanuwara',
                'Walallawita'
            ],

            /* ================= CENTRAL PROVINCE ================= */

            'Denuwara Zone' => [
                'Udunuwara',
                'Yatinuwara',
            ],

            'Gampola Zone' => [
                'Ganga Ihala Korale',
                'Pasbage Korale',
                'Udapalatha',
            ],

            'Kandy Zone' => [
                'Gangawata Korale',
                'Pathahewaheta',
            ],

            'Katugastota Zone' => [
                'Akurana',
                'Galagedara',
                'Harispattuwa',
                'Hatharaliyadda',
                'Poojapitiya',
            ],

            'Teldeniya Zone' => [
                'Medadumbara',
                'Minipe',
                'Udadumbara',
            ],

            'Wattegama Zone' => [
                'Kundasale',
                'Panvila',
                'Pathadumbara',
            ],

            'Galewala Zone' => [
                'Dambulla',
                'Galewala',
                'Pallepola',
            ],

            'Matale Zone' => [
                'Matale',
                'Rattota',
                'Ukuwela',
                'Yatawatta',
            ],

            'Naula Zone' => [
                'Ambanganga Korale',
                'Naula',
            ],

            'Wilgamuwa Zone' => [
                'Laggala',
                'Wilgamuwa',
            ],

            'Hanguranketha Zone' => [
                'Udahewaheta',
            ],

            'Hatton Zone' => [
                'Ambagamuwa',
                'Hatton Tamil-I',
                'Hatton Tamil-II',
                'Hatton Tamil-III',
            ],

            'Kotmale Zone' => [
                'Kotmale',
            ],

            'Nuwara Eliya Zone' => [
                'Nuwara Eliya',
                'Nuwara Eliya Tamil-1',
                'Nuwara Eliya Tamil-2',
                'Nuwara Eliya Tamil-3',
            ],

            'Walapane Zone' => [
                'Walapane',
            ],

            /* ================= UVA PROVINCE ================= */

            'Badulla Zone' => [
                'Badulla',
                'Hali-Ela',
            ],

            'Bandarawela Zone' => [
                'Bandarawela',
                'Ella',
                'Haldummulla',
                'Haputale',
            ],

            'Mahiyanganaya Zone' => [
                'Mahiyanganaya',
                'Rideemaliyedda',
            ],

            'Passara Zone' => [
                'Passara',
            ],

            'Viyulawa Zone' => [
                'Kandaketiya',
                'Meegahakivula',
                'Soranatota',
            ],

            'Welimada Zone' => [
                'Uva Paranagama',
                'Welimada',
            ],

            'Bibile Zone' => [
                'Bibile',
                'Madulla',
                'Medagama',
            ],

            'Moneragala Zone' => [
                'Badalkumbura',
                'Moneragala',
                'Siyambalanduwa',
            ],

            'Thanamalwila Zone' => [
                'Thanamalwila',
            ],

            'Wellawaya Zone' => [
                'Buttala',
                'Wellawaya',
            ],

            /* ================= SABARAGAMUWA PROVINCE ================= */

            'Balangoda Zone' => [
                'Balangoda',
                'Imbulpe',
                'Weligepola',
            ],

            'Embilipitiya Zone' => [
                'Embilipitiya',
                'Godakawela',
                'Kolonna',
            ],

            'Nivitigala Zone' => [
                'Ayagama',
                'Elapatha',
                'Kahawatta',
                'Kalawana',
                'Nivitigala',
            ],

            'Ratnapura Zone' => [
                'Eheliyagoda',
                'Kuruwita',
                'Pelmadulla',
                'Ratnapura',
                'Sri Pada',
            ],

            'Dehiowita Zone' => [
                'Dehiowita',
                'Deraniyagala',
                'Kitulgala',
                'Ruwanwella',
                'Yatiyantota',
            ],

            'Kegalle Zone' => [
                'Dedigama',
                'Galigamuwa',
                'Kegalle',
                'Warakapola',
            ],

            'Mawanella Zone' => [
                'Aranyaka',
                'Mawanella',
                'Rambukkana',
            ],

            /* ================= NORTH CENTRAL PROVINCE ================= */

            'Anuradhapura Zone' => [
                'Nachchaduwa',
                'Nochchiyagama',
                'Nuwaragampalata East',
                'Nuwaragampalata Central',
                'Rambewa',
                'Wilachchiya',
            ],

            'Galenbindunuwewa Zone' => [
                'Galenbindunuwewa',
                'Kahatagasdigiliya',
                'Mihintale',
            ],

            'Kebithigollewa Zone' => [
                'Horowpothana',
                'Kebithigollewa',
                'Medawachchiya',
                'Padaviya',
            ],

            'Kekirawa Zone' => [
                'Ipalogama',
                'Kekirawa',
                'Palagala',
                'Palugaswewa',
                'Thirappane',
            ],

            'Thambuttegama Zone' => [
                'Galnewa',
                'Rajanganaya',
                'Thalawa',
                'Thambuttegama',
            ],

            'Dimbulagala Zone' => [
                'Aralaganwila',
                'Dimbulagala',
                'Welikanda',
            ],

            'Hingurakgoda Zone' => [
                'Elahera',
                'Hingurakgoda',
                'Medirigiriya',
            ],

            'Polonnaruwa Zone' => [
                'Lankapura',
                'Thamankaduwa',
            ],

            /* ================= NORTH WESTERN PROVINCE ================= */

            'Giriulla Zone' => [
                'Alawwa',
                'Kuliyapitiya East',
                'Pannala',
            ],

            'Ibbagamuwa Zone' => [
                'Ganewatta',
                'Ibbagamuwa',
                'Rideegama',
            ],

            'Kuliyapitiya Zone' => [
                'Bingiriya',
                'Dahanekgedara',
                'Kuliyapitiya West',
                'Panduwasnuwara',
                'Udubaddawa',
            ],

            'Kurunegala Zone' => [
                'Kurunegala',
                'Mawathagama',
                'Polgahawela',
            ],

            'Maho Zone' => [
                'Galgamuwa',
                'Giribawa',
                'Maho',
                'Polpitigama',
            ],

            'Nikaweratiya Zone' => [
                'Kobeigane',
                'Kotavehera',
                'Nikaweratiya',
                'Wariyapola',
            ],

            'Chilaw Zone' => [
                'Arachchikattuwa',
                'Chilaw',
                'Nattandiya',
                'Wennappuwa',
            ],

            'Puttalam Zone' => [
                'Anamaduwa',
                'Kalpitiya',
                'Pallama',
                'Puttalam North',
                'Puttalam South',
            ]
        ];

        foreach ($divisions as $zoneName => $divisionNames) {

            $zone = EducationZone::whereRaw('LOWER(zone_name) = ?', [strtolower($zoneName)])->first();

            if (!$zone) {
                $this->command->warn("Zone not found: {$zoneName}");
                continue;
            }

            foreach ($divisionNames as $divisionName) {
                EducationDivision::firstOrCreate([
                    'division_name' => $divisionName,
                    'zone_id' => $zone->id
                ]);
            }
        }
    }
}
