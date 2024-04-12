<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fixture;
use App\Models\SectionHeading;
use App\Models\Season;
use App\Models\User;
use App\Models\UserTeam;
 use App\Models\Team;
 use App\Models\Payment;
 use Auth;
 use App\Http\Requests\FixtureRequest;
 use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use DateTime;

class FixtureController extends Controller
{

    private function getStartAndEndDate($week, $year) {
        $dto = new DateTime();
        $dto->setISODate($year, $week);
        $dto->modify('+4 days');
        $ret['week_start'] = $dto->format('Y-m-d');
        $dto->modify('+6 days');
        $ret['week_end'] = $dto->format('Y-m-d');
        return $ret;
      }
    private $league_id = 1 ;// league id basically determines the leagues for eg NFL ,FIFA etc


    public function index()
    {
        $fixtures = Fixture::with('first_team_id' , 'second_team_id' , 'season')->orderBy('id' , 'desc')->get();
        $fixtureHeading = SectionHeading::where('name' , 'Upcoming Fixture')->first();
        //dd($fixtures);
        $seasons = Season::get();
      return view('backend.fixture.index' , compact('fixtures' , 'seasons' , 'fixtureHeading'));
    }

    public function fixtures_data()
    {
        $fixture = Fixture::with('first_team_id' , 'second_team_id' , 'season')->paginate(6);
        return response()->json($fixture , 200);
    }

    public function create(){
        $fixtures = Fixture::with('first_team_id' , 'second_team_id' , 'season')->get();
        $seasons = Season::orderBy('id' , 'DESC')->get();
        // $seasons = Season::where('status' , 'active')->get();
        $teams = Team::get();
        return view('backend.fixture.add_fixture' , compact('fixtures' , 'seasons' ,'teams'));
    }

    function to_24_hour($hours,$minutes,$seconds,$meridiem){
        $hours = sprintf('%02d',(int) $hours);
        $minutes = sprintf('%02d',(int) $minutes);
        $seconds = sprintf('%02d',(int) $seconds);
        $meridiem = (strtolower($meridiem)=='am') ? 'am' : 'pm';
        return date('H:i:s', strtotime("{$hours}:{$minutes}:{$seconds} {$meridiem}"));
       }

    public function store(FixtureRequest $request){


            if($request->isMethod('post')){
              $duration = Season::where('id',$request->season)->first();
              $start = Carbon::parse($duration->starting);
              $end = Carbon::parse($duration->ending);
              $store = Carbon::parse($request->date)->addSecond(1);;

            //   if($store <= $end){
            //     return redirect()->back()->with('error_date','Please Enter the  valid date.(Fixture date should be in between season starting and ending date.)');
            //   }
                $diff = $start->diffInWeeks($store);
                $finalWeek = $diff+1;


            //     $strtDate = $duration->starting;
            //     $currnet_year = Carbon::createFromFormat('Y-m-d H:i:s', $duration->starting)->year;
            //     $endDate = $request->date;


            // $dateS= $strtDate;
            // $dateE= $endDate;
            // $dateSD_STR = strtotime($dateS);
            // $dateED_STR = strtotime($dateE);
            // $SDweek_number = date('W', date($dateSD_STR));
            // $EDweek_number = date('W', date($dateED_STR));
            // $prevweek_array = $this->getStartAndEndDate(($EDweek_number - 1) , $currnet_year);
            // $week_array = $this->getStartAndEndDate($EDweek_number , $currnet_year);//year should be pass dynamically

            // if(strtotime($prevweek_array['week_start']) <= strtotime($dateE) && strtotime($dateE) <= strtotime($prevweek_array['week_end'])){
            //     $finalWeek = ($EDweek_number - $SDweek_number)  ;
            // }else{
            //     $finalWeek = ($EDweek_number - $SDweek_number) + 1 ;
            // }
            // echo " FINAL WEEK NUMBER : {$finalWeek}";
            // // // dd($finalWeek);
            //  die();

                $fixture_data = Fixture::where(['season_id' => $request->season ,'first_team' => $request->first_team , 'second_team' =>$request->second_team , 'week'=>$finalWeek , 'date' =>$request->date ])->first();
                if ($fixture_data) {
                    return redirect()->back()->with('message_error' , 'Fixture already exists !');
                //  dd($fixture_data);
                }
                else{
                        $splitDate = explode(' ', $request->date, 3);

                       // $formatted_date = Carbon::parse($date)->format('j F, Y');
                       //$dayname = Carbon::parse($date)->dayName;

                       $date = $splitDate[0]; // date
                       $time = $splitDate[1]; // time
                       $time_zone = $splitDate[2]; // am or pm

                       $match_time =  explode(':',$time);

                       $match_time_in_24_hour_format =    $date.' '.$this->to_24_hour($match_time[0], $match_time[1],1, $time_zone);

              Fixture::create([
                'season_id' => $request->season,
                'first_team' => $request->first_team,
                'second_team' => $request->second_team,
                'week' => $finalWeek,
                'date' => $date,
                'time' => $time,
                'time_zone' => $time_zone,
                'match_date_time'=> $match_time_in_24_hour_format,
              ]);
              return redirect('admin/fixtures')->with('success' , 'Fixture Created successfully');
            }
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id){
        // $fixtures = Fixture::where('id' , $id)->with('first_team_id' , 'second_team_id' , 'season')->get();
        // $season = Season::get();

        $fixture = Fixture::where('id' , $id)->first();
        $seasons = Season::orderBy('id' , 'DESC')->get();
        //  $seasons = Season::where('status' , 'active')->get();
         $teams = Team::get();

        return view('backend.fixture.edit_fixture' , compact('fixture' ,'seasons' , 'teams'));
    }

    public function update(FixtureRequest $request , $id){

        if($request->isMethod('put')){
            $duration = Season::where('id',$request->season)->first();
            $start = Carbon::parse($duration->starting);
            $end = Carbon::parse($duration->ending);
            $store = Carbon::parse($request->date);
            $diff = $start->diffInWeeks($store);
            $finalWeek = $diff+1;

            // if($end < $store){
            //     return redirect()->back()->with('error_date','Please Enter the  valid date.(Fixture date should be in between season starting and ending date.)');
            // }
            //   $diff = $start->diff($store);
            //   $week = ceil($diff->d/7);
            //   $finalWeek = ((int)$week);
            //   if($finalWeek == 0){
            //     $finalWeek = 1;
            // }

            // $strtDate = $duration->starting;
            //     $currnet_year = Carbon::createFromFormat('Y-m-d H:i:s', $duration->starting)->year;
            //     $endDate = $request->date;


            // $dateS= $strtDate;
            // $dateE= $endDate;
            // $dateSD_STR = strtotime($dateS);
            // $dateED_STR = strtotime($dateE);
            // $SDweek_number = date('W', date($dateSD_STR));
            // $EDweek_number = date('W', date($dateED_STR));
            // $prevweek_array = $this->getStartAndEndDate(($EDweek_number - 1) , $currnet_year);
            // $week_array = $this->getStartAndEndDate($EDweek_number , $currnet_year);//year should be pass dynamically

            // if(strtotime($prevweek_array['week_start']) <= strtotime($dateE) && strtotime($dateE) <= strtotime($prevweek_array['week_end'])){
            //     $finalWeek = ($EDweek_number - $SDweek_number)  ;
            // }else{
            //     $finalWeek = ($EDweek_number - $SDweek_number) + 1 ;
            // }

            //   $fixture_data = Fixture::where([[('id' , '!=' , $id)] ,  'season_id' => $request->season ,'first_team' => $request->first_team , 'second_team' =>$request->second_team , 'week'=>$f_week , 'date' =>$request->date ])->first();
              $fixture_data = Fixture::where([['id' , '!=' , $id] , ['season_id' , '=' ,  $request->season] , ['first_team' ,'=' ,  $request->first_team ]  , ['second_team' , '=', $request->second_team ], ['week' , '=', $finalWeek ], ['date' , '=' , $request->date] ])->first();

              if ($fixture_data) {
                    return redirect()->back()->with('message_error' , 'Fixture already exists !');
                //  dd($fixture_data);
                }
                else{

                    $splitDate = explode(' ', $request->date, 3);
                    $date = $splitDate[0];
                    $formatted_date = Carbon::parse($date)->format('j F, Y');
                    $dayname = Carbon::parse($date)->dayName;
                    $time = $splitDate[1];
                    $time_zone = $splitDate[2];


                    $match_time =  explode(':',$time);

                    $match_time_in_24_hour_format =    $date.' '.$this->to_24_hour($match_time[0], $match_time[1],0, $time_zone);



            Fixture::where('id' , $id)->update([
                'season_id' => $request->season,
                'first_team' => $request->first_team,
                'second_team' => $request->second_team,
                'week' => $finalWeek,
                'date' => $date,
                'time' => $time,
                'time_zone' => $time_zone,
                'match_date_time'=> $match_time_in_24_hour_format,
            ]);
            return redirect('admin/fixtures')->with('success' , 'Fixture updated successfully');
        }
    }
    }

    public function destroy($id){
        // Fixture::where('id' , $id)->delete();
        // return redirect()->back()->with('success' , 'Fixture deleted successfully');
    }

    public function deleteFixture($id){
        Fixture::where('id' , $id)->delete();
        return redirect()->back()->with('success' , 'Fixture deleted successfully');
    }





    public function section_heading(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate(['section_heading'=> 'required']);
            if ($request->section_heading) {
                SectionHeading::where('name' , 'Upcoming Fixture')->update([
                    'value' => $request->section_heading,
                ]);
            }
            else{
                SectionHeading::where('name' , 'Upcoming Fixture')->update([
                    'value' => 'Upcoming Fixture'
                ]);
            }

        return redirect('admin/fixtures')->with('success' , 'Fixture Title updated successfully');
        }
    }







    public function loss_user()
    {
     $last_date_fixture_week =    Carbon::now()->addDays(8)->format('Y-m-d');
     $first_date_fixture_week =    Carbon::now()->addDays(1)->format('Y-m-d');

      $data= Fixture::whereBetween('date', [$first_date_fixture_week,  $last_date_fixture_week ])->pluck('id')->toArray();



      $users = User::where('role_as' , 0)->get();
    $user_teams = UserTeam::where(['user_id' => 47 , 'week' => 2])
    // ->whereNotIn('fixture_id', [1 , 2 , 3])
    // ->where('fixture_id' , '!=' , $array)
    ->pluck('fixture_id')->toArray();

  $array_diff =   array_diff($data ,$user_teams );


       dd($user_teams);
    //   $array = [];
    //   foreach($data as $item ){
    //         a
    //   }
    //   die();
     $today_date = Carbon::now()->format('Y-m-d');


     $start_date_fixtures =  Fixture::where(['season_id'=> 1, 'week' => 2])->orderBy('id' , 'asc')->first();
     $week_start_date =   $start_date_fixtures->date;

     $end_date_fixtures =  Fixture::where(['season_id'=> 1, 'week' => 2])->orderBy('id' , 'desc')->first();
     $week_end_date =   $end_date_fixtures->date;

       dd($week_end_date);

    }

    public function my_results()
    {

    $get_weeks = Fixture::pluck('week')->toArray();

    $user_teams = UserTeam::where(['user_id' => 47 ])->pluck('week')->toArray();
    $array_diff =   array_diff($get_weeks ,$user_teams );
    dd($array_diff);

       return view('front.my_results');
    }




}


