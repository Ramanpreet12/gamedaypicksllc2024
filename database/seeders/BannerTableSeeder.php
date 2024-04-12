<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;
use Carbon\Carbon;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerRecords = [
            ['id' => 1 , 'heading' => 'Banner Heading' , 'serial' => 1 , 'image' => '' , 'status' => 'Active' , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 2 , 'heading' => 'Banner Heading two' , 'serial' => 2 , 'image' => '' , 'status' => 'Active' ,'created_at' => Carbon::now() , 'updated_at' => Carbon::now()],
            ['id' => 3 , 'heading' => 'Banner Heading three' , 'serial' => 3 , 'image' => '' , 'status' => 'Active' ,'created_at' => Carbon::now() , 'updated_at' => Carbon::now()]
        ];
        Banner::insert($bannerRecords);
    }
}
