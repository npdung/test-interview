<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->insert([
            [
                'name' => 'Algeria',
                'logo' => 'resources/images/flags/dz.svg',
            ],
            [
                'name' => 'Ấn Độ',
                'logo' => 'resources/images/flags/in.svg',
            ],
            [
                'name' => 'Bangladesh',
                'logo' => 'resources/images/flags/bd.svg',
            ],
        ]);
    }
}
