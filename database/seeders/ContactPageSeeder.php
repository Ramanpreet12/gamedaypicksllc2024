<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactPage;
use Carbon\Carbon;


class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ContactPageRecords = [
            ['id' => 1 , 'heading' => 'ContactPage Heading' , 'sub_heading' =>  'ContactPage SubHeading' ,'content' => 'lorem' ,  'image' => '' , 'status' => 'Active' , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],

        ];
        ContactPage::insert($ContactPageRecords);
    }
}
