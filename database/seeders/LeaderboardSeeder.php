<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Leaderboard;
use Carbon\Carbon;

class LeaderboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leaderboardRecords = [
            ['id' => 1 , 'team_id' => 1 , 'region' => 'north' , 'win' => 15 , 'loss' => 10 , 'pts' => 20 , 'status' => 'active' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 2 , 'team_id' => 2 , 'region' => 'east' , 'win' => 5 , 'loss' => 6 , 'pts' => 30 , 'status' => 'active' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 3, 'team_id' => 3, 'region' => 'west' , 'win' => 3, 'loss' => 8 , 'pts' => 25 , 'status' => 'active' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],

        ];
        Leaderboard::insert($leaderboardRecords);
    }
}
