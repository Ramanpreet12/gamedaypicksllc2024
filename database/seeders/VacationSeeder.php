<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacation;
use Carbon\Carbon;

class VacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacationRecords = [
            ['id' => 1 , 'title' => 'vacation title' ,      'serial' => 1 ,    'image' => '' , 'video' => '' ,  'status' => 'active' , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 2 , 'title' => 'vacation title two' ,   'serial' => 2 ,   'image' => '' , 'video' => '' ,  'status' => 'active' ,'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 3 , 'title' => 'vacation Heading three' , 'serial' => 3 , 'image' => '' , 'video' => '' ,  'status' => 'active' ,'created_at' => Carbon::now() , 'updated_at' => Carbon::now()]
        ];
        Vacation::insert($vacationRecords);
    }
}
