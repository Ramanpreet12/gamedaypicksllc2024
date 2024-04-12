<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamResult;
use Carbon\Carbon;

class TeamResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamResultRecords = [
            ['id' => 1  , 'team1_id' =>1  , 'team2_id' => 2 , 'team1_score' => 4 , 'team2_score' => 2 ,
             'win' => '' , 'loss' => '' , 'status' => 'active' , 'result_status' => 'win' , 'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()]
        ];
        TeamResult::insert($teamResultRecords);
    }
}
