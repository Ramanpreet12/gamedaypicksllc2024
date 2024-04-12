<?php



namespace App\Http\Controllers;



use App\Models\ColorSetting;

use App\Models\Banner;

use App\Http\Controllers\Controller;

use App\Models\Team;

// use App\Models\TeamResult;

use App\Models\Fixture;

use App\Models\Leaderboard;

use App\Models\News;

use App\Models\Menu;

use App\Models\SectionHeading;

use Illuminate\Support\Facades\DB;

use App\Models\Region;

use App\Models\Vacation;

use Illuminate\Http\Request;

use App\Models\Season;

use App\Models\Reviews;
use App\Models\NewsAlerts;
use App\Models\Visitor;
use App\Models\CraftmanVisitor;
use App\Models\GeneralSetting;


use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Mail;

use App\Mail\SubscriptionExpire;

use Illuminate\Support\Facades\Log;

use Cache;

use Illuminate\Support\Collection;





class HomeController extends Controller

{





    private function getTheTopPlayersDataBasedOnRegion($region="",$limit=3,$alphabet="",$group=""){

        $leaderboard_data = array();



        $leaderBoard_users_win_data_1  = DB::table('user_teams')

        ->select((DB::raw("COUNT(user_teams.points) as total_win_pts_in_region")) , 'user_teams.user_id as user_id' ,'users.name as user_name' , 'user_teams.points as user_pts' , 'regions.region as region_name' , 'teams.logo as team_logo' , 'teams.name as team_name')

        ->join('teams' , 'teams.id' , '=' , 'user_teams.team_id')

        ->join('users' , 'users.id' , '=' , 'user_teams.user_id')

        ->join('regions', 'regions.id', '=', 'user_teams.user_region_id');



         if(isset($alphabet) && !empty($alphabet)){

            $leaderBoard_users_win_data_1->where('users.name', 'like', "{$alphabet}%");

         }

         if(isset($group) && !empty($group)){

            $leaderBoard_users_win_data_1->where('users.group',$group);

         }

         $leaderBoard_users_win_data_1->where('user_teams.points', '=' , 1)

        ->where('regions.region', '=' , $region)

        ->groupBy(['region_name','user_id'])

        ->orderBy('total_win_pts_in_region','DESC')

        ->limit($limit);



        $leaderBoard_users_win_data = $leaderBoard_users_win_data_1->get();





         if($leaderBoard_users_win_data->isNotEmpty()){

            foreach($leaderBoard_users_win_data as $leaderBoard_user_win_data){

                $leaderboard_data[$leaderBoard_user_win_data->user_id]['user_name'] =$leaderBoard_user_win_data->user_name;

                $leaderboard_data[$leaderBoard_user_win_data->user_id]['team_logo'] =$leaderBoard_user_win_data->team_logo;

                $leaderboard_data[$leaderBoard_user_win_data->user_id]['user_points']['win'] = $leaderBoard_user_win_data->total_win_pts_in_region;

            }

         }



        $leaderBoard_users_loss_data_1  = DB::table('user_teams')

        ->select((DB::raw("COUNT(user_teams.points) as total_loss_pts_in_region")) , 'user_teams.user_id as user_id' ,'users.name as user_name' , 'user_teams.points as user_pts' , 'regions.region as region_name' , 'teams.logo as team_logo' , 'teams.name as team_name')

        ->join('teams' , 'teams.id' , '=' , 'user_teams.team_id')

        ->join('users' , 'users.id' , '=' , 'user_teams.user_id')

        ->join('regions', 'regions.id', '=', 'user_teams.user_region_id');

        if(isset($alphabet) && !empty($alphabet)){

            $leaderBoard_users_loss_data_1->where('users.name', 'like', "{$alphabet}%");

         }

         if(isset($group) && !empty($group)){

            $leaderBoard_users_loss_data_1->where('users.group',$group);

         }

         $leaderBoard_users_loss_data_1->groupBy(['region_name','user_id'])

        ->orderBy('total_loss_pts_in_region','ASC')

        ->limit($limit)

        ->where('user_teams.points', '=' , 2)

        ->where('regions.region', '=' ,$region);



        $leaderBoard_users_loss_data = $leaderBoard_users_loss_data_1->get();



        //get the users with 0 points

        $leaderBoard_users_null_data_1  = DB::table('user_teams')

        ->select('user_teams.user_id as user_id' ,'users.name as user_name' , 'user_teams.points as user_pts' , 'regions.region as region_name' , 'teams.logo as team_logo' , 'teams.name as team_name')

        ->join('teams' , 'teams.id' , '=' , 'user_teams.team_id')

        ->join('users' , 'users.id' , '=' , 'user_teams.user_id')

        ->join('regions', 'regions.id', '=', 'user_teams.user_region_id');

        if(isset($alphabet) && !empty($alphabet)){

            $leaderBoard_users_null_data_1->where('users.name', 'like', "{$alphabet}%");

         }

         if(isset($group) && !empty($group)){

            $leaderBoard_users_null_data_1->where('users.group',$group);

         }

         $leaderBoard_users_null_data_1->groupBy(['region_name','user_id'])



        ->limit($limit)

        ->where('user_teams.points', '=' , 0)

        ->where('regions.region', '=' ,$region);



        $leaderBoard_users_null_data = $leaderBoard_users_null_data_1->get();





        if($leaderBoard_users_win_data->isEmpty()){

            foreach($leaderBoard_users_loss_data as $leaderBoard_user_loss_data){

                $leaderboard_data[$leaderBoard_user_loss_data->user_id]['user_name'] =$leaderBoard_user_loss_data->user_name;

                $leaderboard_data[$leaderBoard_user_loss_data->user_id]['team_logo'] =$leaderBoard_user_loss_data->team_logo;

                $leaderboard_data[$leaderBoard_user_loss_data->user_id]['user_points']['loss'] = $leaderBoard_user_loss_data->total_loss_pts_in_region;

                $leaderboard_data[$leaderBoard_user_loss_data->user_id]['user_points']['win'] = 0;

            }

         }





         else{



            foreach($leaderBoard_users_loss_data as $leaderBoard_user_loss_data){

                $leaderboard_data[$leaderBoard_user_loss_data->user_id]['user_name'] =$leaderBoard_user_loss_data->user_name;

                $leaderboard_data[$leaderBoard_user_loss_data->user_id]['team_logo'] =$leaderBoard_user_loss_data->team_logo;

                $leaderboard_data[$leaderBoard_user_loss_data->user_id]['user_points']['loss'] = $leaderBoard_user_loss_data->total_loss_pts_in_region;



                if(isset( $leaderboard_data[$leaderBoard_user_loss_data->user_id]['user_points']['win'])){

                    $leaderboard_data[$leaderBoard_user_loss_data->user_id]['user_points']['win']  =  $leaderboard_data[$leaderBoard_user_loss_data->user_id]['user_points']['win'];

                }else{

                    $leaderboard_data[$leaderBoard_user_loss_data->user_id]['user_points']['win']  =  0;

                }

            }

         }







         if( $leaderboard_data){

            foreach($leaderboard_data as $user_id_as_key => $leaderboard){

                if(empty($leaderboard['user_points']['loss'])){

                    $leaderboard_data[$user_id_as_key]['user_points']['loss'] = 0;

                }

            }

         }



        $get_count   = count($leaderboard_data);





          // We are writing below code because we need to display those record of customer who are not chose any team for the season but they paid for the season





        // logic here  is if the customer count less than 3  then we will find out other customer who are not participted



        if($get_count<3){



        $leaderBoard_users_null_data_1  = DB::table('user_teams')

        ->select('user_teams.user_id as user_id' ,'users.name as user_name' , 'user_teams.points as user_pts' , 'regions.region as region_name' , 'teams.logo as team_logo' , 'teams.name as team_name')

        ->join('teams' , 'teams.id' , '=' , 'user_teams.team_id')

        ->join('users' , 'users.id' , '=' , 'user_teams.user_id')

        ->join('regions', 'regions.id', '=', 'user_teams.user_region_id');







        if(isset($alphabet) && !empty($alphabet)){

            $leaderBoard_users_null_data_1->where('users.name', 'like', "{$alphabet}%");

         }

         if(isset($group) && !empty($group)){

            $leaderBoard_users_null_data_1->where('users.group',$group);

         }



         $leaderBoard_users_null_data_1->groupBy(['region_name','user_id'])



        ->limit(3-$get_count)

        ->where('user_teams.points', '=' , 0)

        ->where('regions.region', '=' ,$region);



        $leaderBoard_users_null_data = $leaderBoard_users_null_data_1->get();





        if($leaderBoard_users_null_data->isNotempty()){



            foreach($leaderBoard_users_null_data as $leaderBoard_users_null_data_single_player){



            if(!array_key_exists($leaderBoard_users_null_data_single_player->user_id,$leaderboard_data)){

            $leaderboard_data[$leaderBoard_users_null_data_single_player->user_id]['user_name'] =$leaderBoard_users_null_data_single_player->user_name;

            $leaderboard_data[$leaderBoard_users_null_data_single_player->user_id]['team_logo'] =$leaderBoard_users_null_data_single_player->team_logo;

            $leaderboard_data[$leaderBoard_users_null_data_single_player->user_id]['user_points']['loss'] = 0;

            $leaderboard_data[$leaderBoard_users_null_data_single_player->user_id]['user_points']['win']  = 0;

            }





           }

                  // If we already have genuine customer which are greter than 3 than we don't show fake record. See below for genrating fake record of customer process

              if(count($leaderboard_data) >= 3){

                return  $leaderboard_data;

              }



           }



        }



        // We are writing this code because client want to show those records when customer is enrolled in the game but not selected zany team. We will only consider this when there is no records coming from above code.





        // We are writing this code because client want to show the fake data if there is no data in his database.

        // We we only fetch 3 fake records from each reason or 3 - customer record fetched from above logic

        //@ Fetching the fake data from the config file name fakeRecord_Playroaster in config folder



        $fake_customers_records   = config('fakeRecords_playerRoster.fakePlayerRosterRecords');



        // passing the region name as key in the array varibale  $fake_customers_records.

         $fake_cutomers_records_per_region =  $fake_customers_records[$region];









         // count the number genuine customer above logic.



        $count_of_customers = count($leaderboard_data);



        // check if data is avaialble in config file

        if(count($fake_cutomers_records_per_region)>0){



        $fetch_count_genuine_cutomer =    count($leaderboard_data);



        // number of fake record to be genrated

        $total_fake_record_need_to_fetch =  3 -  $fetch_count_genuine_cutomer;



         // only fetch 3 records  in the loop

        $incrementor =  0;





        // if there is searching on behlaf of alphabet

        // logic : we unseting those customer from array whose name  first letter which does not match searched alphabet.



        if(!empty($alphabet)){



            foreach($fake_cutomers_records_per_region as $user_id_key => $fake_cutomer_records_per_region){



                if(substr($fake_cutomer_records_per_region['user_name'], 0, 1) !=  $alphabet){



                    unset($fake_cutomers_records_per_region[$user_id_key]);

                }



            }



        }



        /** end */







        foreach($fake_cutomers_records_per_region as $user_id_key => $fake_cutomer_records_per_region){

            if($total_fake_record_need_to_fetch > $incrementor){



            $leaderboard_data[ $user_id_key]['user_name'] = $fake_cutomer_records_per_region['user_name'];

            $leaderboard_data[ $user_id_key]['team_logo'] = $fake_cutomer_records_per_region['team_logo'];

            $leaderboard_data[ $user_id_key]['user_points']['loss'] =$fake_cutomer_records_per_region['user_points']['loss'];

            $leaderboard_data[ $user_id_key]['user_points']['win']  =$fake_cutomer_records_per_region['user_points']['win'];

            }

            $incrementor++;

        }

      }



       return  $leaderboard_data;



    }



    public function index()

    {

        //get menu

        $menus = Menu::with('menu')->where('status', 'active')->get();

        $mainMenus = Menu::where('parent_id', 0)->get();

        $subMenus = Menu::where('parent_id', '!=', 0)->get();

        $colorSection = array();

        $color_setting = ColorSetting::get();

        if (!empty($color_setting)) {

            foreach ($color_setting as $color) {

                $colorSection[$color['section']] = $color;

            }

        }

        //get banners

        $banners = Banner::where('status', 'Active')->orderBy('serial' , 'ASC')->get();

        // $matchBoards = Fixture::with('first_team_id' , 'second_team_id' , 'season')->inRandomOrder()->limit(1)->get();

        $Win_matchBoards = DB::table('fixtures')
        ->where('date' ,'>' ,Carbon::now()->format('Y-m-d'))

       ->select('fixtures.win as fixture_win' ,'teams.id as win_team_id' , 'teams.logo as win_team_logo' , 'teams.name as win_team_name')

        ->selectRaw('COUNT(fixtures.win) AS total_win_pts_of_team')

        ->join('teams' , 'teams.id' , '=' ,'fixtures.win')

        ->groupBy('teams.id')

        ->inRandomOrder()->limit(1)

        ->get();




        $Loss_matchBoards = DB::table('fixtures')
        ->where('date' ,'>' ,Carbon::now()->format('Y-m-d'))
        ->select('fixtures.loss as fixture_loss' ,'teams.id as loss_team_id' , 'teams.logo as loss_team_logo' , 'teams.name as loss_team_name')

         ->selectRaw('COUNT(fixtures.loss) AS total_loss_pts_of_team')

         ->join('teams' , 'teams.id' , '=' ,'fixtures.loss')

         ->groupBy('teams.id')

         ->inRandomOrder()->limit(1)

         ->get();



        $coll = new Collection ([$Win_matchBoards ,$Loss_matchBoards ]);

        $matchBoards_win_loss = $coll->collapse();

        //  dd($matchBoards_win_loss);

        // $upcoming_matches = Fixture::with('first_team_id', 'second_team_id', 'season')->inRandomOrder()->limit(5)->get();
        $upcoming_matches = Fixture::where('date' ,'>' ,Carbon::now()->format('Y-m-d'))->with('first_team_id', 'second_team_id', 'season')

                                    ->inRandomOrder()->limit(5)->get();


                                    // dd(Carbon::now()->format('Y-m-d'));
                                    // dd($upcoming_matches);


        if (Cache::has('leader_board_regions_wise_users_results')) {



            $leader_board_regions_wise_users_results =  Cache::get('leader_board_regions_wise_users_results');

        }else{

            // $empty_leaderBoard_data = array();

            $leader_board_regions_wise_user_result = array();

            $leader_board_regions_wise_user_result['North'] =    $this->getTheTopPlayersDataBasedOnRegion('North');

            $leader_board_regions_wise_user_result['East'] =    $this->getTheTopPlayersDataBasedOnRegion('East');

            $leader_board_regions_wise_user_result['South'] =    $this->getTheTopPlayersDataBasedOnRegion('South');

            $leader_board_regions_wise_user_result['West'] =    $this->getTheTopPlayersDataBasedOnRegion('West');

            $leader_board_regions_wise_user_result['Mid-West'] =    $this->getTheTopPlayersDataBasedOnRegion('Mid-West');

            $leader_board_regions_wise_user_result['Overseas'] =    $this->getTheTopPlayersDataBasedOnRegion('Overseas');

            $leader_board_regions_wise_users_results  =  $leader_board_regions_wise_user_result;

            Cache::put('leader_board_regions_wise_users_results', $leader_board_regions_wise_user_result, now()->addMinutes(60));

        }

        $fixtureHeading = SectionHeading::where('name', 'Upcoming Fixture')->first();

        $leaderboardHeading = SectionHeading::where('name', 'leaderboard')->first();

        $videosHeading = SectionHeading::where('name', 'Vacation')->first();

        $newsHeading = SectionHeading::where('name', 'News')->first();

        $playerRosterHeading = SectionHeading::where('name' , 'Player Roster')->first();

        $reviewsHeading = SectionHeading::where('name' , 'Reviews')->first();

        //get videos and news

        $news = News::where('type', "news")->where('status', "active")->get();

        // $video = News::where('type',"video")->where('status',"active")->get();

        $vacations = Vacation::where('status', "active")->get();

        //get reviews

        $get_reviews = Reviews::where('status' , 'active')->inRandomOrder()->limit(10)->get();
        $get_teams = Team::where('status' , 'active')->select('logo')->get();

        return view('home.index',compact('get_teams' , 'get_reviews' ,'colorSection' , 'banners', 'upcoming_matches' ,'leader_board_regions_wise_users_results', 'news' ,'vacations' , 'menus' , 'mainMenus' , 'subMenus' , 'leaderboardHeading' , 'fixtureHeading' , 'leaderboardHeading' ,'playerRosterHeading','videosHeading' ,'newsHeading' ,'matchBoards_win_loss' ,'reviewsHeading'));

    }





    //  private function getPlayersData($group='',$PlayerName=''){

    //     $roster_data_query = DB::table('user_teams')

    //     ->join('teams' , 'teams.id' , '=' , 'user_teams.team_id')

    //     ->join('users' , 'users.id' , '=' , 'user_teams.user_id')

    //     ->join('regions', 'regions.id', '=', 'teams.region_id')

    //     ->select('')

    //     ->orderBy('position' , 'asc');



    //     if(isset($PlayerName)){

    //         $roster_data_query->where('users.name', 'like', "{$PlayerName}%");

    //       }



    //     $roster_data_query->where('users.group',$group);

    //     $customer_players_data = $roster_data_query->get()->groupBy(['region']);



    //      if($customer_players_data->isEmpty()){

    //         return 0;

    //      };





    //     if(Cache::has('regions')){

    //         $PlayersRegions = Cache::get('regions');

    //       }else{

    //          $get_regions =  Region::where('status' , 'active')->select('region')->get();

    //          $PlayersRegions =  Cache::put('regions', $get_regions);

    //       }

    //        $roster_data = [];

    //        foreach($PlayersRegions as $regions){

    //         if(isset($customer_players_data[$regions->region])){

    //             $roster_data[$regions->region] = $customer_players_data[$regions->region];

    //         }else{

    //             $roster_data[$regions->region] = collect([]);

    //         }

    //        }

    //        return   $roster_data;



    //  }



    private function getPlayersData($group='',$PlayerName='' , $region = ""){

        $roster_data = array();

        $roster_win_data_query  = DB::table('user_teams')

        ->select((DB::raw("COUNT(user_teams.points) as total_win_pts_in_region")) , 'user_teams.user_id as user_id' ,'users.name as user_name' , 'user_teams.points as user_pts' , 'regions.region as region_name' , 'teams.logo as team_logo' , 'teams.name as team_name')

        ->join('teams' , 'teams.id' , '=' , 'user_teams.team_id')

        ->join('users' , 'users.id' , '=' , 'user_teams.user_id')

        ->join('regions', 'regions.id', '=', 'user_teams.user_region_id')

        ->groupBy(['region_name','user_id'])

        ->orderBy('total_win_pts_in_region','DESC')

        ->limit(3)

        ->where('user_teams.points', '!=' , 0)

        ->where('regions.region', '=' , 'North')

        ->get();









        if(isset($PlayerName)){

            $roster_win_data_query->where('users.name', 'like', "{$PlayerName}%");

          }



        $roster_win_data_query->where('users.group',$group);

        if($roster_win_data_query->isNotEmpty()){

            foreach($roster_win_data_query as $roster_win_data){

                $roster_data[$roster_win_data->user_id]['user_name'] =$roster_win_data->user_name;

                $roster_data[$roster_win_data->user_id]['team_logo'] =$roster_win_data->team_logo;

                $roster_data[$roster_win_data->user_id]['user_points']['win'] = $roster_win_data->total_win_pts_in_region;

            }

         }



         $roster_loss_data_query  = DB::table('user_teams')

        ->select((DB::raw("COUNT(user_teams.points) as total_loss_pts_in_region")) , 'user_teams.user_id as user_id' ,'users.name as user_name' , 'user_teams.points as user_pts' , 'regions.region as region_name' , 'teams.logo as team_logo' , 'teams.name as team_name')

        ->join('teams' , 'teams.id' , '=' , 'user_teams.team_id')

        ->join('users' , 'users.id' , '=' , 'user_teams.user_id')

        ->join('regions', 'regions.id', '=', 'user_teams.user_region_id')

        ->groupBy(['region_name','user_id'])

        ->orderBy('total_loss_pts_in_region','ASC')

        ->limit(3)

        ->where('user_teams.points', '=' , 0)

        ->where('regions.region', '=' ,'North')

        ->get();





         dd($roster_loss_data_query);



        // $customer_players_data = $roster_data_query->get()->groupBy(['region']);



        //  if($customer_players_data->isEmpty()){

        //     return 0;

        //  };





        // if(Cache::has('regions')){

        //     $PlayersRegions = Cache::get('regions');

        //   }else{

        //      $get_regions =  Region::where('status' , 'active')->select('region')->get();

        //      $PlayersRegions =  Cache::put('regions', $get_regions);

        //   }

        //    $roster_data = [];

        //    foreach($PlayersRegions as $regions){

        //     if(isset($customer_players_data[$regions->region])){

        //         $roster_data[$regions->region] = $customer_players_data[$regions->region];

        //     }else{

        //         $roster_data[$regions->region] = collect([]);

        //     }

        // }

         //  return   $roster_data;



     }





    public function getAlphabets(Request $request)

    {





        $name = $request->letters;

        $gp = $request->path;

         $roster_data=[];

        $roster_data['North'] =  $this->getTheTopPlayersDataBasedOnRegion('North',100,$name,$gp);

        $roster_data['East'] =  $this->getTheTopPlayersDataBasedOnRegion('East',100,$name,$gp);

        $roster_data['South'] =  $this->getTheTopPlayersDataBasedOnRegion('South',100,$name,$gp);

        $roster_data['West'] =  $this->getTheTopPlayersDataBasedOnRegion('West',100,$name,$gp);

        $roster_data['Mid-West'] =  $this->getTheTopPlayersDataBasedOnRegion('Mid-West',100,$name,$gp);







        $roster_data['Overseas'] =  $this->getTheTopPlayersDataBasedOnRegion('Overseas',100,$name,$gp);



        foreach($roster_data as $rd){

            $region = $rd;

            if(!empty($region)){

                // return response()->json(['roster_data' =>  $roster_data, 'status' => true], 200);

                $msg = $roster_data;

                $status = "true";

                break;

            }else{

               $msg = "error";

               $status = "false";

            }

        }



        return response()->json(['roster_data' => $msg, 'status' => $status]);

    }



    public function playerStanding($alphabets)

    {

        $gp = $alphabets;

        $roster_data['North'] =  $this->getTheTopPlayersDataBasedOnRegion('North',100,'',$gp);

        $roster_data['East'] =  $this->getTheTopPlayersDataBasedOnRegion('East',100,'',$gp);

        $roster_data['South'] =  $this->getTheTopPlayersDataBasedOnRegion('South',100,'',$gp);

        $roster_data['West'] =  $this->getTheTopPlayersDataBasedOnRegion('West',100,'',$gp);

        $roster_data['Mid-West'] =  $this->getTheTopPlayersDataBasedOnRegion('Mid-West',100,'',$gp);

        $roster_data['Overseas'] =  $this->getTheTopPlayersDataBasedOnRegion('Overseas',100,'',$gp);











        return view('front.playerRoster' , compact('roster_data'));

    }



    public function checkPlan()

    {

        try {

            $now = Carbon::now();

            $ex_date = $now->addDays();

            $data = DB::table('seasons')->where('starting', '<=', $now)->where('ending', '>=', $now)->get();

            if ($data->isNotEmpty()) {

                foreach ($data as $key => $value) {

                    $ex = DB::table('payments as p')->join('users', 'users.id', 'p.user_id')->where('p.season_id', $value->id)->whereDate('p.expire_on', '=', $ex_date)->get();

                    foreach ($ex as $k => $v) {

                       Mail::to($v->email)->send(new SubscriptionExpire($v));

                    }

                }

            }

        } catch (\Exception $e) {

            Log::info($e->getMessage());

        }

    }

     //news alerts

     public function news_alerts(Request $request){

        $request->validate([
            'email' => 'email|required'
        ]);
        $news_alerts = new NewsAlerts;
        $news_alerts->email = $request->email;
        $news_alerts->save();
       return response()->json(['message' =>'Email for news alerts submitted successfully.' , 200]);
        // return redirect()->back()->with('success' , 'Email for news alerts submitted successfully.');

    }

    //gameday campaign number of visitors (change route name visitors to landing)
     public function visitors(Request $request) {

        $ip = $request->ip();

            Visitor::create([
                'ip_address' => $ip,
            ]);


        $get_visitor_count = Visitor::count();


       $get_ip_address = Visitor::where('ip_address' ,'=' , $ip)->first();




         return view('front.visitors' , compact('get_visitor_count' , 'get_ip_address'));
    }

    public function store_visitor(Request $request){

        return redirect()->route('home');
        // $ip = $request->ip();
        // if (Visitor::where('ip_address', $ip)->count() < 1)
        // {
        //     Visitor::create([
        //         'ip_address' => $ip,
        //     ]);

        //     return redirect()->route('home');
        // }
    }

    //score boad count landing page
    public function landing() {
        $get_landing_counts = GeneralSetting::where('type', 'landing_count')->get()->toArray();
        $landing_counts = key_value('name', 'value', $get_landing_counts);
        return view('front.scoreCount_page' , compact('landing_counts'));
    }

//wolf page

public function wolfPage(Request $request) {
    $ip = $request->ip();
    CraftmanVisitor::create([
        'ip_address' => $ip,
    ]);
        $get_visitor_count = CraftmanVisitor::count();
        $get_ip_address = CraftmanVisitor::where('ip_address' ,'=' , $ip)->first();
        return view('front.wolf_page' , compact('get_visitor_count' , 'get_ip_address'));
}



public function storeCraftmanVisitors(Request $request) {
    return redirect()->route('home');

}

     //cron function
     public function updateUserPreMatchs(){
        $date = Carbon::now()->isoFormat('YYYY-MM-DD');;
       $season =Season::select('id')->where('status','active')->first();

       if(!empty($season)){
          $week =Fixture::select('id','week')->where('date', '<=',$date)->where('season_id',$season->id)->orderby('date', 'desc')->first();

          if(!empty($week)){
              $currentWeek = $week["week"];
              $fixtureData = Fixture::select('id','week')->where('season_id','=',$season->id)->where('week','=',(int)$currentWeek)->get();
              $paidUser = Payment::select('id','user_id')->where('season_id',$season->id)->where('status','succeeded')->get();

              foreach($paidUser as $user){
                  if(!empty($fixtureData)){
                  foreach( $fixtureData as $fixture){
                      $userTeam =UserTeam::select('id')->where('fixture_id',$fixture->id)->where('season_id',$season->id)->where('user_id',$user->user_id)->where('week','=',(int)$currentWeek)->first();

                      if(!empty($userTeam)){
                          continue;
                      }
                          $teamData = [
                              'user_id'=>$user->user_id,
                              'user_region_id'=>$user->user->region_id,
                              'season_id'=>$season->id,
                              'fixture_id'=>$fixture->id,
                              'week'=>$fixture->week,
                              'team_id'=>'0',
                              'points'=>'2'
                          ];
                          $address = UserTeam::create($teamData);

              }

              }

          }

      }

   }
   die("Record run successfully");
  }


  
  public function AfterSchoolPhysEduSports(){
    return view('front.afterSchoolSports_landing');

  }

}

