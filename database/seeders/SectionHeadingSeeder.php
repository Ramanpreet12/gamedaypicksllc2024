<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\SectionHeading;

class SectionHeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionHeadingRecords = [
            ['id' => 1 , 'name' => 'Upcoming Fixture' , 'value' => 'Upcoming Fixture' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 2 , 'name' => 'Leaderboard' , 'value' => 'Leaderboard' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 3 , 'name' => 'News' , 'value' => 'News' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 4 , 'name' => 'Videos' , 'value' => 'Videos' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 5 , 'name' => 'Prize' , 'value' => 'prize' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 6 , 'name' => 'Player Roster' , 'value' => 'Player Roster' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 7 , 'name' => 'Reviews' , 'value' => 'Reviews' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
        ];
        SectionHeading::insert($sectionHeadingRecords);
    }
}
