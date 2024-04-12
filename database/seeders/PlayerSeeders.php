<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;
use Carbon\Carbon;

class PlayerSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $playerRecords = [
           ['id' => 1 , 'team_id' => 1 , 'name' => 'Michael C. McCarthy' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
           ['id' => 2 , 'team_id' => 2 , 'name' => 'Albert Jackson'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()  ],
           ['id' => 3 , 'team_id' => 3 , 'name' => 'Samuel Burnett'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()  ],
           ['id' => 4 , 'team_id' => 4 , 'name' => 'Jesse Housley'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
           ['id' => 5 , 'team_id' => 5 , 'name' => 'Tyson Norman'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
           ['id' => 6 , 'team_id' => 6 , 'name' => 'Zack Isaacson'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
           ['id' => 7 , 'team_id' => 7 , 'name' => 'Ava Dunn'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
           ['id' => 8 , 'team_id' => 8 , 'name' => 'Amelie Beadle' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()  ],
           ['id' => 9 , 'team_id' => 1 , 'name' => 'Matt E. Beasley' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()  ],
           ['id' => 10 , 'team_id' => 2 , 'name' => 'Daniel Durham'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
           ['id' => 11 , 'team_id' => 3 , 'name' => 'Roger D. Wagner' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()  ],
           ['id' => 12 , 'team_id' => 4 , 'name' => 'Thomas N. Shearer' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()  ],
           ['id' => 13 , 'team_id' => 5 , 'name' => 'John M. Rios' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()  ],
           ['id' => 14 , 'team_id' => 6 , 'name' => 'Aiden Riddoch'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
           ['id' => 15 , 'team_id' => 7 , 'name' => 'Anthony Mills'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
           ['id' => 16 , 'team_id' => 8, 'name' => 'Roland L. Buckner'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
           ['id' => 17 , 'team_id' => 9 , 'name' => 'Joseph Barkman' ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now()  ],
           ['id' => 18 , 'team_id' => 10 , 'name' => 'Jake Owens'  ,  'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],



        ];
        Player::insert($playerRecords);

    }
}
