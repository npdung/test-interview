<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $algeria = DB::table('countries')->where('name', 'Algeria')->first();
        $india = DB::table('countries')->where('name', 'Ấn Độ')->first();
        $bangladesh = DB::table('countries')->where('name', 'Bangladesh')->first();

        DB::table('competitions')->insert([
            [
                'name' => 'UEFA Champions League',
                'country_id' => null,
                'logo' => 'resources/images/competitions/uefa_champions_league.svg',
            ],
            [
                'name' => 'Giải bóng đá nữ Algeria',
                'country_id' => $algeria->id,
                'logo' => null,
            ],
            [
                'name' => 'Liga U21 Youth Algeria',
                'country_id' => $algeria->id,
                'logo' => null,
            ],
            [
                'name' => 'Siêu cúp Ấn Độ- Bảng đấu A',
                'country_id' => $india->id,
                'logo' => null,
            ],
            [
                'name' => 'Giải ngoại hạng Bangladesh - Vòng 4',
                'country_id' => $bangladesh->id,
                'logo' => null,
            ],
        ]);
    }
}
