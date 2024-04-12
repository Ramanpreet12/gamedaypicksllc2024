<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MatchResult;
use Carbon\Carbon;


class MatchResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matchResult = [
            ['id' => 1 ,'page_heading' => 'Match Results By Region' , 'selected_season_heading' => 'Selected Season' ,
            'select_season_heading' => 'Select Season' ,'total_player_heading' => 'Total Players' ,
            'region_heading' => 'Region' ,'players_total_win' => 'Players Total Win' , 'players_total_loss' => 'Players Total Loss' ,

             'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],

        ];
        MatchResult::insert($matchResult);
    }
}
