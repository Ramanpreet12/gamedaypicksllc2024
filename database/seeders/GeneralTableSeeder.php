<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\General;

class GeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generalRecords = [
            ['id' => 1 , 'name' => 'NFL' , 'email' => 'info@stylemixthemes.com' ,
             'homepage_title'=>'We love Football' , 'homepage_subtitle'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe earum magnam facere',
             'logo'=> '' , 'favicon' =>'' , 'footer_contact'=>  '888 71 140 30 20' , 'footer_address' =>'USA, California 20, First Avenue, California'
             ]
        ];
        General::insert($generalRecords);
    }
}

