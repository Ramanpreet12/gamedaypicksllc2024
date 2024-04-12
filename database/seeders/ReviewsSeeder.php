<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reviews;
use Carbon\Carbon;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ReviewRecords = [
            ['id' => 1 ,'username' => 'Jeff M. Munoz' , 'email' => 'jeff@gmail.com' ,'comment' => 'Hello, I am interested in the NFL Website for GameDay Picks. I would like to purchase this service.' , 'rating' => '4' ,'status' => 'active', 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 2 ,'username' => 'George N. Callahan' , 'email' => 'George@gmail.com' ,'comment' => 'Hey there!I just wanted to let you know about my great experience with NFL Website For GameDay Picks.This website is perfect for anyone who wants to make sure they dont miss a single game while keeping track of their favorite team. It is easy to use and makes picking the team a breeze. Plus, the payment process was simple and straightforward.' , 'rating' => '5' ,'status' => 'active', 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 3 ,'username' => 'John D. Tinsley' , 'email' => 'John@gmail.com' ,'comment' => 'In addition to providing weekly results, the website also offers a prize for the winner at the end of the season. This makes it an exciting and challenging experience to try and predict the outcome of each game. I highly recommend this website to anyone who loves sports and wants to have some fun while doing so!            Thank you!' , 'rating' => '4' ,'status' => 'active', 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 4 ,'username' => 'Joseph R. Finn' , 'email' => 'Joseph@gmail.com' ,'comment' => 'I&#8220;m a big NFL fan, so I was really excited to try out NFL Season 2023-2024 Gameday pick website. I loved the Payment process because it was very affordable. You only have to pay $100 to get started, and the amount you pay is based on the number of picks you make. The website is easy to use and navigate. You can select any team and get the result week by week. The prize at the end is definitely worth trying out! .' , 'rating' => '4' ,'status' => 'active', 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 5 ,'username' => 'Richard T. Smith' , 'email' => 'Richard@gmail.com' ,'comment' => 'The payment process was simple and affordable. Furthermore, the amount of money you have to spend is really reasonable. In fact, if you follow all the games correctly, you could win a prize! I would definitely recommend NFL Season 2023-2024 Gameday pick website to anyone looking for a fun and exciting way to follow their team &#8220;s games. ' , 'rating' => '5' ,'status' => 'active', 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],
            ['id' => 6 ,'username' => 'Patrick T. Rabin' , 'email' => 'Patrick@gmail.com' ,'comment' => 'I love to follow my team&#8220;s every game. So when I heard about NFL Season 2023-2024 Gameday pick website, I knew I had to give it a try. The website is easy to use. Just enter your team&#8220;s name and league, and you &#8220; re good to go. You can also choose to follow individual games, which gives you an advantage in predicting the result.' , 'rating' => '5' ,'status' => 'active', 'created_at' => Carbon::now() , 'updated_at' => Carbon::now() ],

        ];
        Reviews::insert($ReviewRecords);
    }
}

