<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminJersey;
use Carbon\Carbon;

class AdminJerseySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jerseyRecords = [
            ['id' => 1 , 'name' => 'test 1 Cleveland Browns Custom White Jersey' , 'price' => '100' , 'description' => 'Cleveland Browns Custom White Jersey 75th Anniversary Patch ' ,  'image' => '' , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 2 , 'name' => 'test 2 Cleveland Browns Custom Black Jersey' ,  'price' => '200' ,  'description' => '' ,  'image' => 'Cleveland Browns Custom White Jersey 75th Anniversary Patch ' ,'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 3 , 'name' => 'test 3 Cleveland Browns Custom Red Jersey' , 'price' => '300' ,  'description' => '' ,  'image' => 'Cleveland Browns Custom White Jersey 75th Anniversary Patch ' ,'created_at' => Carbon::now() , 'updated_at' => Carbon::now()]
        ];
        AdminJersey::insert($jerseyRecords);
    }
}
