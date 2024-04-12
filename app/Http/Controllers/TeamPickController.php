<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Payment;
use App\Models\UserTeam;
use App\Models\Coupon;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\TeamSelected;
use App\Models\Team;
use App\Models\Season;
use App\Models\Jersey;
use Auth;

class TeamPickController extends Controller
{
    private $league_id = 1 ;// league id basically determines the leagues for eg NFL ,FIFA etc
    public function index(Request $request)
    {
        $fixtures = collect([]);
        $season_name = null;
        $get_all_seasons = collect([]);
        $c_season = array();
        $get_current_year = Carbon::now()->format('Y');
        $season_data  = Season::where('status','active')->first();
        if($season_data == null){
            return view('front.teampick');
        }
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

        // If there is no active season . Then redirect with no found record.
        if(!$season_data){
            return view('front.teampick' , compact('fixtures' , 'season_name' , 'get_all_seasons' , 'c_season' ,'upcoming_season_date' ,'upcoming_week'));
        }
        // Now checking if  there is season coming in parameter from url. If not then assign the season id from above $current_season_data.
        // $current_season_id = $request->seasons ? $request->seasons : $current_season_data->id;
        $current_season_id = $request->seasons ? $request->seasons : $get_current_season->id;

        // Now checking if  there is week coming in parameter from url. If not then assign the season id from above $current_season_data.
        $selected_week = $request->weeks ? $request->weeks : 1;
        $select_season_data = Season::where('id' ,$current_season_id)->first();
        $fixtures = Fixture::with('first_team_id','second_team_id' , 'season')
        ->where(['season_id'=> $current_season_id,'week'=>$selected_week])
        ->get()->groupby('week');
        if( $select_season_data){
             $c_season = DB::table('seasons')->whereRaw('"' . $select_season_data->starting . '" between `starting` and `ending`')
                               ->where(['id' => $current_season_id])->first();
           
        }
         $get_all_seasons = Season::orderby('id' , 'desc')->get();
         $season_name =  $select_season_data->season_name;
        $get_selected_teams_by_user =  UserTeam::where(['user_id' => Auth::user()->id , 'season_id' => $get_current_season->id ])->pluck('team_id')->toArray();
        // dd($get_selected_teams_by_user);
        return view('front.teampick' , compact('fixtures' , 'season_name' , 'get_all_seasons' , 'c_season' ,'get_selected_teams_by_user' ,'upcoming_season_date' ,'upcoming_week'));


    }

//     public function pickTeam(Request $request)
//     {

//         // dd($request);
//         // try {
//             $team = $request->team;
//             $season_id = $request->season;
//             $week = $request->week;
//             $fixture = $request->fixture;
//             $id = auth()->user()->id;


//             // $c_date = Carbon::now();
//             $c_date = Season::where('status' , 'active')->value('starting');
//             $expire_date = Payment::where(['season_id' => $season_id, 'user_id' => $id])->value('expire_on');


//             $user_status = User::where('id', $id)->value('subscribed');
//             if ($user_status == "0") {
//                 return redirect()->back()->with('error', 'You are not subscribe for team select');
//             } else if ($user_status == "1" && $expire_date < $c_date) {
//                 return redirect()->back()->with('error', 'Please subscribe first your plan is expired');
//             } else {
//                 $select = UserTeam::where(['user_id' => $id, 'season_id' => $season_id, 'week' => $week])->first();
//                 if ($select) {
//                    $update =  UserTeam::where(['user_id' => $id, 'season_id' => $season_id, 'week' => $week])->update(['team_id'=>$team]);
//                    if($update){
//                        return redirect()->back()->with('success', 'Team is updated sucessfully for week ' . $week);
//                    }else{
//                     return redirect()->back()->with('error', 'Something is went wrong please try later');
//                    }
//                 } else {
//                     $created =  UserTeam::create([
//                         'user_id' => $id,
//                         'leauge_id' => 1,
//                         'season_id' => $season_id,
//                         'week' => $week,
//                         'team_id' => $team,
//                         'fixture_id'=>$fixture,
//                     ]);

//                     $user = User::where('id',$id)->first();
//                     $team = Team::where('id',$team)->value('name');
//                     $data = ['week'=>$week,'team'=>$team,'user_name'=>$user->name];
//                     if ($created) {
//                         Mail::to($user->email)->send(new TeamSelected($data));
//                         return redirect()->back()->with('success', 'Congratulation your team is selected successfully');
//                     } else {
//                         return redirect()->back()->with('error', 'Sorry team is not selected something went wrong');
//                     }
//                 }
//             }
//         // } catch (\Exception $e) {
//         //     Log::info($e->getMessage());
//         // }
//     }

public function dashboard_team_pick(Request $request)
{
    if (!Auth::check()) {
       return response()->json(['message' => 'login','status'=>false], 200);
    }
    $team_id = $request->team_id;
            $season_id = $request->season_id;

            $week = $request->week;
            $fixture_id = $request->fixture_id;
            $user_id = auth()->user()->id;
            $user_region_id = auth()->user()->region_id;
            $user_status = Payment::where(['user_id' => $user_id,'season_id'=> $season_id,'status'=>'succeeded'])->first();
            $user_coupon_check = Coupon::where(['user_id' => $user_id])->first();
            // $user_coupon_check = Jersey::where('email' , Auth::user()->email)->first();

            // dd($user_coupon_check);

            if ($user_status || $user_coupon_check) {
                //get current season date
                $get_current_season = Season::where(['status'=>'active' , 'id' => $season_id])->first();
                $get_current_season_date = $get_current_season->starting;

                $current_date = Carbon::now() < $get_current_season->starting ? $get_current_season->starting: Carbon::now() ;  // current time and date
                $is_user_allowed_to_choose_fixture =  Fixture::where(['season_id'=> $season_id, 'week' => $week])->orderBy('date','ASC')->first();

                if($is_user_allowed_to_choose_fixture == null){
                    return response()->json(['message' => 'Sorry.Please try again','status'=>false], 200);
                }

                $DeferenceInDays = Carbon::parse($current_date)->diffInDays($is_user_allowed_to_choose_fixture->date);

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


        public function check_user_subscribe(Request $request)
        {
            $user_id = auth()->user()->id;
            $season_id = $request->season_id;
            $user_status = Payment::where(['user_id' => $user_id,'season_id'=> $season_id,'status'=>'succeeded'])->first();
            $user_coupon_check = Coupon::where(['user_id' => $user_id])->first();
            // $user_coupon_check = Jersey::where('email' , Auth::user()->email)->first();

            // dd($user_coupon_check);
            if($user_status){

                    return response()->json(['message' => 'subscribed','status'=>true], 200);

                }
                elseif($user_coupon_check != null){
                    return response()->json(['message' => 'subscribed','status'=>true], 200);
                }
                else{
                    return response()->json(['message' => 'not subscribed','status'=>false], 200);
                }
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
                            'points'=>'2' // because user has not select any match in  the week , so user will get loss
                        ];
                        $address = UserTeam::create($teamData);

                    }
                }
            }
            return true;
        }

 }
