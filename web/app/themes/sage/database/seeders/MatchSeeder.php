<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c1               = DB::table( 'competitions' )->where( 'name', 'UEFA Champions League' )->first();
        $wAlgeria         = DB::table( 'competitions' )->where( 'name', 'Giải bóng đá nữ Algeria' )->first();
        $u21Algeria       = DB::table( 'competitions' )->where( 'name', 'Liga U21 Youth Algeria' )->first();
        $cupIndia         = DB::table( 'competitions' )->where( 'name', 'Siêu cúp Ấn Độ- Bảng đấu A' )->first();
        $bangladeshLeague = DB::table( 'competitions' )->where( 'name', 'Giải ngoại hạng Bangladesh - Vòng 4' )->first();

        $realMadrid       = DB::table( 'teams' )->where( 'name', 'Real Madrid' )->first();
        $barcelona        = DB::table( 'teams' )->where( 'name', 'Barcelona' )->first();
        $akbouW           = DB::table( 'teams' )->where( 'name', 'CLB nữ Akbou' )->first();
        $afakRelizaneW    = DB::table( 'teams' )->where( 'name', 'Afak Relizane (w)' )->first();
        $jfKhroubW        = DB::table( 'teams' )->where( 'name', 'CLB nữ Jf Khroub' )->first();
        $aseAlgerCentreW  = DB::table( 'teams' )->where( 'name', 'ASE AlgerCentre (w)' )->first();
        $crBelouizdadW    = DB::table( 'teams' )->where( 'name', 'CR Belouizdad (w)' )->first();
        $aseBejajaW       = DB::table( 'teams' )->where( 'name', 'ASE Bejaja (w)' )->first();
        $saouraU21        = DB::table( 'teams' )->where( 'name', 'Saoura U21' )->first();
        $kabylieU21       = DB::table( 'teams' )->where( 'name', 'Kabylie U21' )->first();
        $hyderabad        = DB::table( 'teams' )->where( 'name', 'Hyderabad' )->first();
        $sreenidiDeccan   = DB::table( 'teams' )->where( 'name', 'Sreenidi Deccan' )->first();
        $fortisLimited    = DB::table( 'teams' )->where( 'name', 'Fortis Limited' )->first();
        $rahmatgonjMfs    = DB::table( 'teams' )->where( 'name', 'Rahmatgonj MFS' )->first();
        $sheikhJamai      = DB::table( 'teams' )->where( 'name', 'Sheikh Jamai' )->first();
        $bashundharaKings = DB::table( 'teams' )->where( 'name', 'Bashundhara Kings' )->first();

        DB::table('matches')->insert([
            [
                'competition_id' => $c1->id,
                'home_team_id' => $barcelona->id,
                'away_team_id' => $realMadrid->id,
                'status_id' => 8,
                'match_time' => 1304463900,
                'home_scores' => json_encode([1, 0, 0, 1, 3, 0, 0]),
                'away_scores' => json_encode([1, 0, 0, 5, 2, 0, 0]),
            ],
            [
                'competition_id' => $wAlgeria->id,
                'home_team_id' => $akbouW->id,
                'away_team_id' => $afakRelizaneW->id,
                'status_id' => 4,
                'match_time' => 1756656000,
                'home_scores' => json_encode([1, 1, 0, 1, 1, 0, 0]),
                'away_scores' => json_encode([0, 0, 0, 0, 0, 0, 0]),
            ],
            [
                'competition_id' => $wAlgeria->id,
                'home_team_id' => $jfKhroubW->id,
                'away_team_id' => $aseAlgerCentreW->id,
                'status_id' => 3,
                'match_time' => 1756656600,
                'home_scores' => json_encode([2, 2, 0, 0, 0, 0, 0]),
                'away_scores' => json_encode([0, 0, 0, 0, 1, 0, 0]),
            ],
            [
                'competition_id' => $wAlgeria->id,
                'home_team_id' => $crBelouizdadW->id,
                'away_team_id' => $aseBejajaW->id,
                'status_id' => 3,
                'match_time' => 1756657200,
                'home_scores' => json_encode([1, 1, 0, 1, 4, 0, 0]),
                'away_scores' => json_encode([2, 2, 0, 5, 0, 0, 0]),
            ],
            [
                'competition_id' => $u21Algeria->id,
                'home_team_id' => $saouraU21->id,
                'away_team_id' => $kabylieU21->id,
                'status_id' => 4,
                'match_time' => 1756656000,
                'home_scores' => json_encode([0, 0, 0, 1, 6, 0, 0]),
                'away_scores' => json_encode([4, 2, 0, 5, 3, 0, 0]),
            ],
            [
                'competition_id' => $cupIndia->id,
                'home_team_id' => $hyderabad->id,
                'away_team_id' => $sreenidiDeccan->id,
                'status_id' => 4,
                'match_time' => 1756654200,
                'home_scores' => json_encode([1, 0, 0, 1, 2, 0, 0]),
                'away_scores' => json_encode([4, 4, 0, 5, 3, 0, 0]),
            ],
            [
                'competition_id' => $bangladeshLeague->id,
                'home_team_id' => $fortisLimited->id,
                'away_team_id' => $rahmatgonjMfs->id,
                'status_id' => 4,
                'match_time' => 1756655100,
                'home_scores' => json_encode([1, 1, 0, 1, 5, 0, 0]),
                'away_scores' => json_encode([2, 1, 0, 5, 4, 0, 0]),
            ],
            [
                'competition_id' => $bangladeshLeague->id,
                'home_team_id' => $sheikhJamai->id,
                'away_team_id' => $bashundharaKings->id,
                'status_id' => 4,
                'match_time' => 1756655100,
                'home_scores' => json_encode([0, 0, 0, 1, 5, 0, 0]),
                'away_scores' => json_encode([0, 0, 0, 5, 7, 0, 0]),
            ],
        ]);
    }
}
