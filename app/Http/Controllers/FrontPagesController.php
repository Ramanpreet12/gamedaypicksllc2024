<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactPage;
use App\Models\StaticPage;
use App\Models\Fixture;
use App\Models\Team;
use App\Models\UserTeam;
use App\Models\Season;
use App\Models\Reviews;
use App\Models\Prize;
use App\Models\Payment;
use App\Models\Coupon;
use App\Models\General;
use App\Models\GeneralSetting;
use App\Models\SectionHeading;
use App\Models\MatchResult;

use App\Http\Requests\ReviewsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Auth;



class FrontPagesController extends Controller
{
    private $league_id = 1 ;// league id basically determines the leagues for eg NFL ,FIFA etc
    public function contact(Request $request)
    {
        if ($request->isMethod('POST')) {


            $request->validate([
                         'name'=> 'required',
                        'subject'=>'required',
                        'email'=>'required|email',
                        'message'=>'required',
                        'g-capcha'=>'required'
                    ]);

            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $remoteip = $_SERVER['REMOTE_ADDR'];
            $data = [

                     'secret' => env('CAPCHA_SECRET_KEY'),
                    'response' => $request->get('g-capcha'),
                    'remoteip' => $remoteip
            ];

            $options = [
                'http' => [
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                ]
            ];

            $context = stream_context_create($options);

            $result = file_get_contents($url, false, $context);

            $resultJson = json_decode($result);


            if ($resultJson->success != true) {
                return back()->withErrors(['error' => 'ReCaptcha Error']);
            }
            if ($resultJson->score >= 0.3) {
                $contact =  Contact::create($request->all());

                if($contact){
                        return redirect()->back()->with('success','We got your request and contact you soon!');
                       }else{
                        return redirect()->back()->with('error','Request is not sent');
                       }

                //Validation was successful, add your form submission logic here
                // return back()->with('success', 'Thanks for your message!');
            } else {
            return back()->withErrors(['error' => 'ReCaptcha Error']);
            }
        }else{
            $get_contact_details = GeneralSetting::where('type', 'contactPage')->get()->toArray();
            $contact_details = key_value('name', 'value', $get_contact_details);
           return view('front.contact' , compact('contact_details'));
        }
    }

    public function about()
    {
        // $get_about_details = StaticPage::where('type' , 'about')->first();
        $get_about_details = GeneralSetting::where('type' , 'aboutPage')->get()->toArray();
        $about_details = key_value('name', 'value', $get_about_details);

        return view('front.about' , compact('about_details'));
    }

    public function privacy()
    {
        $get_privacy_details = GeneralSetting::where('type' , 'privacyPage')->get()->toArray();
        $privacy_details = key_value('name', 'value', $get_privacy_details);
        // $get_privacy_details = StaticPage::where('type' , 'privacy')->first();

        return view('front.privacy' , compact('privacy_details'));
    }
    public function regionResults(Request $request)
    {


         $get_total_points = collect([]);
         $season_name = null;
         $get_all_seasons = collect([]);
         $c_season = array();

        if ($request->isMethod('post')) {
            if ($request->seasons != null )
            {
                return redirect()->route('region-results' , ['season' => $request->seasons]);
            }
        }
        else {


            // get the headings
            $get_match_results_details = MatchResult::first();

                 if($request->season){
                 $c_date = Season::where('id' , $request->season)->value('starting');
                //  $c_date = Season::where('status' , 'active')->where('id' , $request->season)->value('starting');
                 if( $c_date){

                 $c_season = DB::table('seasons')->whereRaw('"' . $c_date . '" between `starting` and `ending`')
                                ->where(['id' =>$request->season])
                                // ->where(['status' => 'active' , 'id' =>$request->season])
                                ->first();
                 }

                 }else{
                    $c_date = Season::where('status' , 'active')->value('starting');
                    if( $c_date){
                    $c_season = DB::table('seasons')->whereRaw('"' . $c_date . '" between `starting` and `ending`')
                    ->where(['status' => 'active'])->first();
                    }
                 }

                if(empty($c_season)){
                    return view('front.region_result' , compact('get_total_points' ,'season_name' , 'get_all_seasons' , 'c_season' , 'get_match_results_details'));
                }
                $season_data = Season::where('id' ,  $c_season->id)->first();
                if (!$season_data) {
                    return view('front.region_result' , compact('get_total_points' ,'season_name' , 'get_all_seasons' , 'c_season' , 'get_match_results_details'));
                }

                // Fetch all the region
                 $allregions = DB::table('regions')->pluck('region','id');

                //get total_loss_pts_in_region where points == 2 (as loss points) out of total_matches_in_region
                $get_total_loss_pts_in_region = DB::table('user_teams')
                ->select((DB::raw("COUNT(user_teams.user_region_id) as total_loss_pts_in_region")), 'user_teams.user_region_id as user_region_id' , 'regions.region as region_name' , 'seasons.season_name' ,'seasons.id as season_id')
                ->join('regions' , 'regions.id' , '=' , 'user_teams.user_region_id')
                ->join('seasons' , 'seasons.id' , '=' ,'user_teams.season_id')
                ->where('season_id',$c_season->id)
                ->where('user_teams.points', '=' , 2)
                ->orderBy('regions.position' , 'asc')
                ->groupby('user_teams.user_region_id')->get();

                 //get total_win_pts_in_region where points == 1 (as win points) out of total_matches_in_region
                 $get_total_win_pts_in_region = DB::table('user_teams')
                 ->select((DB::raw("COUNT(user_teams.user_region_id) as total_win_pts_in_region")), 'regions.region as region_name' , 'seasons.season_name' ,'seasons.id as season_id')
                 ->join('regions' , 'regions.id' , '=' , 'user_teams.user_region_id')
                 ->join('seasons' , 'seasons.id' , '=' ,'user_teams.season_id')
                 ->where('season_id',$c_season->id)
                 ->where('user_teams.points', '=' , 1)
                 ->orderBy('regions.position' , 'asc')
                 ->groupby(DB::raw('user_region_id'))->get();

                 $total_win_loss =  array();
                 foreach($allregions as $key => $region){
                    foreach( $get_total_win_pts_in_region as $data){
                       if($region == $data->region_name ){
                        $total_win_loss[$region]['win'] =  $data->total_win_pts_in_region;
                       }
                    }

                     if(!isset($total_win_loss[$region]['win'])){
                        $total_win_loss[$region]['win'] = 0;
                     }

                    foreach( $get_total_loss_pts_in_region as $data){
                        if($region == $data->region_name ){
                         $total_win_loss[$region]['loss'] =  $data->total_loss_pts_in_region;
                        }
                     }

                     if(!isset($total_win_loss[$region]['loss'])){
                        $total_win_loss[$region]['loss'] = 0;
                     }
                 }
                $season_name = $c_season->season_name;
                $get_all_seasons = Season::orderBy('id' , 'DESC')->get();
                // $get_all_seasons = Season::where('status' , 'active')->get();

                $total_players = UserTeam::where('season_id',$c_season->id)->distinct('user_id')->count();



        return view('front.region_result' , compact('get_match_results_details' , 'total_win_loss' ,'season_name' ,'get_all_seasons' ,'c_season' , 'total_players' ));
     }
    }

    public function nfl_battles(Request $request)
    {

           //get headings of page
           $get_fixture_headings = GeneralSetting::where(['type' => 'matchFixture'])->get()->toArray();
           $fixture_headings = key_value('name', 'value', $get_fixture_headings);
        // dd('test');
        $fixtures = collect([]);
        $season_name = null;
        $get_all_seasons = collect([]);
        $c_season = array();
        $get_current_year = Carbon::now()->format('Y');
        $season_data  = Season::where('status','active')->first();

        if($season_data == null ){

            return view('front.nfl_battles' , compact('fixture_headings'));

        }
                // dd($season_data);
                $get_year_from_season_date = Carbon::createFromFormat('Y-m-d H:i:s', $season_data->starting)->format('Y');
            $get_current_season = Season::where(['status'=>'active'])->first();
            //    $get_current_season = Season::where(['status'=>'active' , 'season_name' => $get_current_year])->first();

            $starting_season_date = Carbon::parse($get_current_season->starting);
            $starting_season_date1 = Carbon::parse($get_current_season->starting);

            $now = Carbon::now();
            if($starting_season_date < $now){
            $length = $starting_season_date->diffInWeeks($now);
            $right_week = $length+1;
            $upcoming_season_date = $starting_season_date->addWeeks($right_week)->subDays(1);
            $upcoming_week =  $starting_season_date1->addWeeks($right_week)->addDays(6);
            }else{
                $upcoming_season_date = $starting_season_date->subDays(1);
                $upcoming_week =  $starting_season_date1->addDays(6);
            }



       $current_season_data  = Season::where('status','active')->first();
       // If there is no active season . Then redirect with no found record.
       if(!$season_data){
           return view('front.nfl_battles' , compact('fixtures' , 'season_name' , 'get_all_seasons' , 'c_season' ,'fixture_headings' , 'upcoming_season_date' ,'upcoming_week'));
       }
       // Now checking if  there is season coming in parameter from url. If not then assign the season id from above $current_season_data.
       $current_season_id = $request->seasons ? $request->seasons : $get_current_season->id;

       // Now checking if  there is week coming in parameter from url. If not then assign the season id from above $current_season_data.
       $selected_week = $request->weeks ? $request->weeks : 1;
       //    03-01-2024 starts
       $select_season_data = Season::where('id' ,$current_season_id)->first();
    //    $select_season_data = Season::where('status' , 'active')->where('id' ,$current_season_id)->first();
    //    03-01-2024 ends
       $fixtures = Fixture::with('first_team_id','second_team_id')
       ->where(['season_id'=> $current_season_id,'week'=>$selected_week])
       // ->whereDate('date','>=',$select_season_data->starting)
       ->get()->groupby('week');
       if( $select_season_data){
        // 03-01-2024 starts
        //    $c_season = DB::table('seasons')->whereRaw('"' . $select_season_data->starting . '" between `starting` and `ending`')
        //                       ->where(['status' => 'active' , 'id' => $current_season_id])->first();

              $c_season = DB::table('seasons')->whereRaw('"' . $select_season_data->starting . '" between `starting` and `ending`')
                 ->where(['id' => $current_season_id])->first();

        //   03-01-2024 ends
       }
         // Fetch all the season which are active
//    03-01-2024 starts
        $get_all_seasons = Season::orderby('id' , 'desc')->get();
        // $get_all_seasons = Season::where('status' , 'active')->orderby('id' , 'desc')->get();
        //    03-01-2024 ends
        $season_name =  $select_season_data->season_name;

       return view('front.nfl_battles' , compact('fixtures' , 'season_name' , 'get_all_seasons' , 'c_season' ,'fixture_headings', 'upcoming_season_date' ,'upcoming_week'));

    }

    public function nfl_battles_team_pick(Request $request)
    {
        // if (!Auth::check()) {
        //    return response()->json(['message' => 'login','status'=>false], 200);
        // }
        if (Auth::check()) {

            $team_id = $request->team_id;
            $season_id = $request->season_id;

            $week = $request->week;
            $fixture_id = $request->fixture_id;
            $user_id = auth()->user()->id;
            $user_region_id = auth()->user()->region_id;
            $user_status = Payment::where(['user_id' => $user_id,'season_id'=> $season_id,'status'=>'succeeded'])->first();
            $user_coupon_check = Coupon::where(['user_id' => $user_id])->first();

            if ($user_status || $user_coupon_check) {
                //get current season date
                $get_current_season = Season::where(['status'=>'active' , 'id' => $season_id])->first();
                $get_current_season_date = $get_current_season->starting;


                $current_date = Carbon::now() < $get_current_season->starting ? $get_current_season->starting: Carbon::now() ;  // current time and date

                //  $fixture_Date     =          Fixture::($week,$season_id,$fixture_id)


                 // customer can select the team till one day before the season start

            //    if( $current_date  < Carbon::parse($get_current_season_date)){

            //       $created =  UserTeam::create([
            //         'user_id' => $user_id,
            //         'user_region_id' => $user_region_id,
            //         'leauge_id' => $this->league_id,
            //         'season_id' => $season_id,
            //         'week' => $week,
            //         'team_id' => $team_id,
            //         'fixture_id'=>$fixture_id,


            //     ]);
            //     return response()->json(['message' => 'added','status'=>true], 200);
            //     $this->updateUserMatchs($season_id);

            //    }
            //    else{
            //     $first_week_last_date  =    Carbon::now($get_current_season_date)->addDays(6);
            //    }







                $is_user_allowed_to_choose_fixture =  Fixture::where(['season_id'=> $season_id, 'week' => $week])->orderBy('date','ASC')->first();

                if($is_user_allowed_to_choose_fixture == null){
                    return response()->json(['message' => 'Sorry.Please try again','status'=>false], 200);
                }

                $DeferenceInDays = Carbon::parse($current_date)->diffInDays($is_user_allowed_to_choose_fixture->date);



                //if user try to select the team after Thursaday 12:00AM
                // if ( $DeferenceInDays <= 0 ) {
                //     return response()->json(['message' => 'Time_is_over_for_thursday_12AM','status'=>false], 200);
                //     }

                    //if user try to select the previous week
                    // if ($is_user_allowed_to_choose_fixture->date < $current_date ) {
                    //     return response()->json(['message' => 'Time_is_over_to_select_previous_weeks','status'=>false], 200);
                    // }

                    //if user try to select next to next week in advance
                    // if ($DeferenceInDays >= 7) {
                    //     return response()->json(['message' => 'Cannot_select_next_to_next_week','status'=>false], 200);
                    // }

               // $is_user_allowed_to_choose_fixture =  Fixture::where(['season_id'=> $season_id, 'week' => $week, 'id'=>$fixture_id, [ 'date', '>', $current_date ]])->first();

                // if no, redirect with error
                 if(!$is_user_allowed_to_choose_fixture){
                    return response()->json(['message' => 'Selection time is over for this fixture.You can choose the fixture till day before the match.','status'=>false], 200);
                 }
                 // if user selected the fixture or not
                $user_selected_fixture_team = UserTeam::where(['user_id' => $user_id, 'season_id' => $season_id, 'week' => $week,'fixture_id'=> $fixture_id ])->first();
                 //dd('user_selected_fixture_team' ,$user_selected_fixture_team);
                 if($user_selected_fixture_team){
                    $user_selected_fixture_team->update(['team_id'=>$team_id ]);
                    return response()->json(['message' => 'update','status'=>true], 200);
                 }
                 else{
                    $created =  UserTeam::create([
                        'user_id' => $user_id,
                        'user_region_id' => $user_region_id,
                        'leauge_id' => $this->league_id,
                        'season_id' => $season_id,
                        'week' => $week,
                        'team_id' => $team_id,
                        'fixture_id'=>$fixture_id,
                    ]);
                    $this->updateUserMatchs($season_id);
                    return response()->json(['message' => 'added','status'=>true], 200);

                 }
            }

            // else{
            //     return response()->json(['message' => 'subscribe','status'=>false], 200);
            // }
        }
    }


    public function check_user_subscribe_for_nfl_battles(Request $request)
    {
        if (Auth::check()) {
            $user_id = auth()->user()->id;
        $season_id = $request->season_id;
        $user_status = Payment::where(['user_id' => $user_id,'season_id'=> $season_id,'status'=>'succeeded'])->first();
        $user_coupon_check = Coupon::where(['user_id' => $user_id])->first();

        if($user_status || $user_coupon_check){
                return response()->json(['message' => 'subscribed','status'=>true], 200);
            }else{
                return response()->json(['message' => 'not subscribed','status'=>false], 200);
            }
        }
         else {
            return response()->json(['message' => 'not_login','status'=>false], 200);
        }
    }




    public function prize()
    {
        $prizes = Prize::with('season')->where('status' , 'active')->get();

        $get_active_season = Season::where('status' , 'active')->first();


        $get_prize_banner = General::where('prize_banner' , '!=' , null)->select('prize_banner','prize_banner_video')->first();
        $get_prize_heading = SectionHeading::where('name', 'Prize')->first();

        return view('front.prize' , compact('prizes' , 'get_prize_banner' , 'get_prize_heading'));

    }

    public function reviews(ReviewsRequest $request)
    {



       $reviews = Reviews::create([
        'username' => $request->username,
        'email' => $request->email,
        'comment' => $request->comment,
        'rating' => $request->rating,
       ]);
       return response()->json(['data' => $reviews , 'message' , 'success'], 200);

    }

    public function gameResult()
    {
        $c_date = Season::where('status' , 'active')->value('starting');
        $c_season = DB::table('seasons')
            ->whereRaw('"' . $c_date . '" between `starting` and `ending`')
            ->where('status' , 'active')->first();
        $get_game_results = Fixture::with('first_team_id','second_team_id')
                            ->whereNotNull(['win' , 'loss'])
                            ->where('season_id',$c_season->id)->whereDate('date','>=',$c_date)
                            ->orderBy('week' , 'desc')
                            ->get()->groupby('week');
        // echo "<pre>";
        // print_r( $get_game_results);
        // die();
       $season_name = $c_season->season_name;


        return view('front.game_result' , compact('get_game_results' ,'season_name'));
    }

    private function updateUserMatchs($season_id){
        $date = Carbon::now()->isoFormat('YYYY-MM-DD');;
        $week =Fixture::where('date', '<=',  $date)
        ->where('season_id',$season_id)
        ->orderby('date', 'desc')
        ->first();

        if(!empty($week)){
        	//DB::enableQueryLog();
        	$currentWeek=$week["week"];
            $fixtureData =Fixture::where('season_id','=',$season_id)
           ->where('week','<=',(int)$currentWeek)
            ->get();
           // $log = DB::getQueryLog();


            if(!empty($fixtureData)){
                foreach( $fixtureData as $fixture){
                	$userTeam =UserTeam::where('fixture_id',$fixture->id)
			->where('season_id',$season_id)
			->where('user_id',auth()->user()->id)
			->first();
			if(!empty($userTeam)){
				continue;
			}
		            $teamData = [
		                'user_id'=>auth()->user()->id,
		                'user_region_id'=>auth()->user()->region_id,
		                'season_id'=>$season_id,
		                'fixture_id'=>$fixture->id,
		                'week'=>$fixture->week,
		                'team_id'=>'0',
                        'points'=>'2' // because user has not select any match in previous week , so user will get loss
		            ];
		            $address = UserTeam::create($teamData);

                }
            }
        }
        return true;
    }


}
