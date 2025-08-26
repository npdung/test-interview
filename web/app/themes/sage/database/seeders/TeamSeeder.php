<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $algeria = DB::table('countries')->where('name', 'Algeria')->first();
        $india = DB::table('countries')->where('name', 'Ấn Độ')->first();
        $bangladesh = DB::table('countries')->where('name', 'Bangladesh')->first();

        $c1 = DB::table('competitions')->where('name', 'UEFA Champions League')->first();
        $wAlgeria = DB::table('competitions')->where('name', 'Giải bóng đá nữ Algeria')->first();
        $u21Algeria = DB::table('competitions')->where('name', 'Liga U21 Youth Algeria')->first();
        $cupIndia = DB::table('competitions')->where('name', 'Siêu cúp Ấn Độ- Bảng đấu A')->first();
        $bangladeshLeague = DB::table('competitions')->where('name', 'Giải ngoại hạng Bangladesh - Vòng 4')->first();

        DB::table('teams')->insert([
            [
                'country_id' => $algeria->id,
                'competition_id' => $c1->id,
                'name' => 'Real Madrid',
                'logo' => 'resources/images/teams/real_madrid.svg',
            ],
            [
                'country_id' => $algeria->id,
                'competition_id' => $c1->id,
                'name' => 'Barcelona',
                'logo' => 'resources/images/teams/barcelona.svg',
            ],
            [
                'country_id' => $algeria->id,
                'competition_id' => $wAlgeria->id,
                'name' => 'CLB nữ Akbou',
                'logo' => 'resources/images/teams/akbou_w.png',
            ],
            [
                'country_id' => $algeria->id,
                'competition_id' => $wAlgeria->id,
                'name' => 'Afak Relizane (w)',
                'logo' => 'resources/images/teams/afak_relizane_w.png',
            ],
            [
                'country_id' => $algeria->id,
                'competition_id' => $wAlgeria->id,
                'name' => 'CLB nữ Jf Khroub',
                'logo' => 'resources/images/teams/jf_khroub.webp',
            ],
            [
                'country_id' => $algeria->id,
                'competition_id' => $wAlgeria->id,
                'name' => 'ASE AlgerCentre (w)',
                'logo' => 'resources/images/teams/ase_alger_centre_w.png',
            ],
            [
                'country_id' => $algeria->id,
                'competition_id' => $wAlgeria->id,
                'name' => 'CR Belouizdad (w)',
                'logo' => 'resources/images/teams/cr_belouizdad_w.png',
            ],
            [
                'country_id' => $algeria->id,
                'competition_id' => $wAlgeria->id,
                'name' => 'ASE Bejaja (w)',
                'logo' => 'resources/images/teams/ase_bejaja_w.webp',
            ],
            [
                'country_id' => $algeria->id,
                'competition_id' => $u21Algeria->id,
                'name' => 'Saoura U21',
                'logo' => 'resources/images/teams/saoura_u21.png',
            ],
            [
                'country_id' => $algeria->id,
                'competition_id' => $u21Algeria->id,
                'name' => 'Kabylie U21',
                'logo' => 'resources/images/teams/kabylie_u21.png',
            ],
            [
                'country_id' => $india->id,
                'competition_id' => $cupIndia->id,
                'name' => 'Hyderabad',
                'logo' => 'resources/images/teams/hyderabad.png',
            ],
            [
                'country_id' => $india->id,
                'competition_id' => $cupIndia->id,
                'name' => 'Sreenidi Deccan',
                'logo' => 'resources/images/teams/sreenidi_deccan.png',
            ],
            [
                'country_id' => $bangladesh->id,
                'competition_id' => $bangladeshLeague->id,
                'name' => 'Fortis Limited',
                'logo' => 'resources/images/teams/fortis_limited.png',
            ],
            [
                'country_id' => $bangladesh->id,
                'competition_id' => $bangladeshLeague->id,
                'name' => 'Rahmatgonj MFS',
                'logo' => 'resources/images/teams/rahmatgonj_mfs.png',
            ],
            [
                'country_id' => $bangladesh->id,
                'competition_id' => $bangladeshLeague->id,
                'name' => 'Sheikh Jamai',
                'logo' => 'resources/images/teams/sheikh_jamai.png',
            ],
            [
                'country_id' => $bangladesh->id,
                'competition_id' => $bangladeshLeague->id,
                'name' => 'Bashundhara Kings',
                'logo' => 'resources/images/teams/bashundhara_kings.png',
            ],
        ]);
    }
}
