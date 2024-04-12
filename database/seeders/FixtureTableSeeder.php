<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fixture;
use Carbon\Carbon;

class FixtureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fixtureRecords = [
            ['id' => 1 , 'season_id' => 3 , 'first_team' => 1 , 'second_team' => 14 , 'week' => 'week 1' ,
                'date' => Carbon::create('2022' , '08' , '9') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
            ] ,
            ['id' => 2 , 'season_id' => 3 , 'first_team' => 2 , 'second_team' => 15 , 'week' => 'week 1'  ,
            'date' => Carbon::create('2022' , '08' , '11') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
            ] ,
            ['id' => 3 , 'season_id' => 3 , 'first_team' => 3 , 'second_team' => 16 , 'week' => 'week 1' ,
            'date' =>Carbon::create('2022' , '08' , '11'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
             ],

             ['id' => 4 , 'season_id' => 3 , 'first_team' => 4 , 'second_team' => 17 , 'week' => 'week 1' ,
                'date' => Carbon::create('2022' , '08' , '11') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
            ] ,
            ['id' => 5 , 'season_id' => 3 , 'first_team' => 5 , 'second_team' => 18 , 'week' => 'week 1'  ,
            'date' => Carbon::create('2022' , '08' , '11') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
            ] ,
            ['id' => 6 , 'season_id' => 3 , 'first_team' => 6 , 'second_team' => 19 , 'week' => 'week 1' ,
            'date' =>Carbon::create('2022' , '08' , '12'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
             ],


             ['id' => 7 , 'season_id' => 3 , 'first_team' => 7 , 'second_team' => 20 , 'week' => 'week 1' ,
             'date' => Carbon::create('2022' , '08' , '13') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
         ] ,
         ['id' => 8 , 'season_id' => 3 , 'first_team' => 2 , 'second_team' => 15 , 'week' => 'week 2'  ,
         'date' => Carbon::create('2022' , '08' , '16') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
         ] ,
         ['id' => 9 , 'season_id' => 3 , 'first_team' => 3 , 'second_team' => 16 , 'week' => 'week 2' ,
         'date' =>Carbon::create('2022' , '08' , '18'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
          ],

          ['id' => 10 , 'season_id' => 3 , 'first_team' => 4 , 'second_team' => 17 , 'week' => 'week 2' ,
          'date' => Carbon::create('2022' , '08' , '18') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
      ] ,
      ['id' => 11 , 'season_id' => 3 , 'first_team' => 5 , 'second_team' => 18 , 'week' => 'week 2'  ,
      'date' => Carbon::create('2022' , '08' , '18') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
      ] ,
      ['id' => 12 , 'season_id' => 3 , 'first_team' => 6 , 'second_team' => 19 , 'week' => 'week 2' ,
      'date' =>Carbon::create('2022' , '08' , '18'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
       ],

       ['id' => 13 , 'season_id' => 3 , 'first_team' => 5 , 'second_team' => 22 , 'week' => 'week 2' ,
       'date' => Carbon::create('2022' , '08' , '18') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
   ] ,
   ['id' => 14 , 'season_id' => 3 , 'first_team' => 6 , 'second_team' => 14, 'week' => 'week 2'  ,
   'date' => Carbon::create('2022' , '08' , '19') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
   ] ,
   ['id' => 15 , 'season_id' => 3 , 'first_team' => 7 , 'second_team' => 20 , 'week' => 'week 2' ,
   'date' =>Carbon::create('2022' , '08' , '19'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
    ],

    ['id' => 16 , 'season_id' => 3 , 'first_team' => 8 , 'second_team' => 23 , 'week' => 'week 2' ,
       'date' => Carbon::create('2022' , '08' , '19') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
   ] ,
   ['id' => 17 , 'season_id' => 3 , 'first_team' => 9 , 'second_team' => 24, 'week' => 'week 2'  ,
   'date' => Carbon::create('2022' , '08' , '20') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
   ] ,
   ['id' => 18 , 'season_id' => 3 , 'first_team' => 10 , 'second_team' => 25 , 'week' => 'week 2' ,
   'date' =>Carbon::create('2022' , '08' , '20'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
    ],

    //season 2
    ['id' => 19 , 'season_id' => 2 , 'first_team' => 1 , 'second_team' => 14 , 'week' => 'week 1' ,
    'date' => Carbon::create('2022' , '08' , '9') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 20 , 'season_id' => 2 , 'first_team' => 2 , 'second_team' => 15 , 'week' => 'week 1'  ,
'date' => Carbon::create('2022' , '08' , '11') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 21 , 'season_id' => 2 , 'first_team' => 3 , 'second_team' => 16 , 'week' => 'week 1' ,
'date' =>Carbon::create('2022' , '08' , '11'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
 ],

 ['id' => 22 , 'season_id' => 2 , 'first_team' => 4 , 'second_team' => 17 , 'week' => 'week 1' ,
    'date' => Carbon::create('2022' , '08' , '11') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 23 , 'season_id' => 2 , 'first_team' => 5 , 'second_team' => 18 , 'week' => 'week 1'  ,
'date' => Carbon::create('2022' , '08' , '11') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 24 , 'season_id' => 2 , 'first_team' => 6 , 'second_team' => 19 , 'week' => 'week 1' ,
'date' =>Carbon::create('2022' , '08' , '12'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
 ],


 ['id' => 25 , 'season_id' => 2 , 'first_team' => 7 , 'second_team' => 20 , 'week' => 'week 1' ,
 'date' => Carbon::create('2022' , '02' , '13') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 26 , 'season_id' => 2 , 'first_team' => 2 , 'second_team' => 15 , 'week' => 'week 2'  ,
'date' => Carbon::create('2022' , '02' , '16') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 27 , 'season_id' => 2 , 'first_team' => 3 , 'second_team' => 16 , 'week' => 'week 2' ,
'date' =>Carbon::create('2022' , '02' , '18'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
],

['id' =>28 , 'season_id' => 2 , 'first_team' => 4 , 'second_team' => 17 , 'week' => 'week 2' ,
'date' => Carbon::create('2022' , '02' , '18') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 29 , 'season_id' => 2 , 'first_team' => 5 , 'second_team' => 18 , 'week' => 'week 2'  ,
'date' => Carbon::create('2022' , '02' , '18') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 30 , 'season_id' => 2 , 'first_team' => 6 , 'second_team' => 19 , 'week' => 'week 2' ,
'date' =>Carbon::create('2022' , '02' , '18'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
],

['id' => 31 , 'season_id' => 2 , 'first_team' => 5 , 'second_team' => 22 , 'week' => 'week 2' ,
'date' => Carbon::create('2022' , '02' , '18') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 32 , 'season_id' => 2 , 'first_team' => 6 , 'second_team' => 14, 'week' => 'week 2'  ,
'date' => Carbon::create('2022' , '02' , '19') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 33 , 'season_id' => 2 , 'first_team' => 7 , 'second_team' => 20 , 'week' => 'week 2' ,
'date' =>Carbon::create('2022' , '02' , '19'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
],

['id' => 34 , 'season_id' => 2 , 'first_team' => 8 , 'second_team' => 23 , 'week' => 'week 2' ,
'date' => Carbon::create('2022' , '02' , '19') , 'time' =>  Carbon::now()->toTimeString() , 'time_zone' => 'am'  ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 35 , 'season_id' => 2 , 'first_team' => 9 , 'second_team' => 24, 'week' => 'week 2'  ,
'date' => Carbon::create('2022' , '02' , '20') , 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'pm' ,'created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
] ,
['id' => 36 , 'season_id' => 2 , 'first_team' => 10 , 'second_team' => 25 , 'week' => 'week 2' ,
'date' =>Carbon::create('2022' , '02' , '20'), 'time' => Carbon::now()->toTimeString(), 'time_zone' => 'am','created_at' => Carbon::now() ,  'updated_at' => Carbon::now()
],



        ];
        Fixture::insert($fixtureRecords);
    }
}
