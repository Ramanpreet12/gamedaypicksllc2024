<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StaticPage;
use Carbon\Carbon;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staticPageRecords = [
            ['id' => 1 , 'heading' => ' Heading' , 'sub_heading' =>  ' SubHeading' ,'content' => 'lorem' ,'type' => 'contact',  'images' => '' , 'status' => 'active' , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 2 , 'heading' => ' Heading' , 'sub_heading' =>  ' SubHeading' ,'content' => 'lorem' ,'type' => 'about',  'images' => '' , 'status' => 'active' , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],

        ];
        StaticPage::insert($staticPageRecords);
    }
}
