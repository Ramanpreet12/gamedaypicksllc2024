<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Season;
use Carbon\Carbon;

class SeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasonRecords = [
            ['id' => 1 , 'season_name' => '2020' , 'starting' => Carbon::now() , 'ending' => Carbon::now() , 'status' => 'active' , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 2 , 'season_name' => '2021' , 'starting' => Carbon::now() , 'ending' => Carbon::now() , 'status' => 'active' ,'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 3 , 'season_name' => '2022' , 'starting' => Carbon::now() , 'ending' => Carbon::now() , 'status' => 'active' ,'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 4 , 'season_name' => '2023' , 'starting' => Carbon::now() , 'ending' => Carbon::now() , 'status' => 'active' , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],

        ];
        Season::insert($seasonRecords);
    }
}
