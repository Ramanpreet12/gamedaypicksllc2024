<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeneralSetting;
use Carbon\Carbon;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generalSettingsRecords = [
            ['id' => 1 ,'name' => 'Facebook' , 'value' => '' , 'type' => 'social_links' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 2 ,'name' => 'Twitter' , 'value' => '' , 'type' => 'social_links' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 3 ,'name' => 'Instagram' , 'value' => '' , 'type' => 'social_links' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 4 ,'name' => 'Google' , 'value' => '' , 'type' => 'social_links' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 5 ,'name' => 'Youtube' , 'value' => '' , 'type' => 'social_links' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 6 ,'name' => 'Pinterest' , 'value' => '' , 'type' => 'social_links' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 7 ,'name' => 'Linkedin' , 'value' => '' , 'type' => 'social_links' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            // ['id' => 8 ,'name' => 'Youtube' , 'value' => '' , 'type' => 'social_links' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],

            //contact page
            ['id' => 8 ,'name' => 'contact_section_heading' , 'value' => 'Contact' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 9 ,'name' => 'contact_location_heading' , 'value' => 'Head Office' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 10 ,'name' => 'contact_page_content' , 'value' => 'loremIpsum' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 11 ,'name' => 'contact_page_image' , 'value' => '' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 12 ,'name' => 'contact_form_heading' , 'value' => 'Club enquiries' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 13 ,'name' => 'contact_social_links_heading' , 'value' => 'Follow us on ' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],

            //match fixture PAge
            ['id' => 14 ,'name' => 'match_fixture_section_heading' , 'value' => 'Match Fixture' , 'type' => 'matchFixture' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 15 ,'name' => 'match_fixture_selected_season_heading' , 'value' => 'Selected Season' , 'type' => 'matchFixture' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 16 ,'name' => 'match_fixture_select_season_heading' , 'value' => 'Select Season' , 'type' => 'matchFixture' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 17 ,'name' => 'match_fixture_selected_week_heading' , 'value' => 'Selected Week' , 'type' => 'matchFixture' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 18 ,'name' => 'match_fixture_select_week_heading' , 'value' => 'Select Week' , 'type' => 'matchFixture' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],

            // ['id' => 9 ,'name' => 'contact_section_heading' , 'value' => 'Contact' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            // ['id' => 20 ,'name' => 'contact_location_heading' , 'value' => 'Head Office' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            // ['id' => 21 ,'name' => 'contact_page_content' , 'value' => 'loremIpsum' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            // ['id' => 22 ,'name' => 'contact_page_image' , 'value' => '' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            // ['id' => 23 ,'name' => 'contact_form_heading' , 'value' => 'Club enquiries' , 'type' => 'contactPage' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],


        ];
        GeneralSetting::insert($generalSettingsRecords);
    }
}
