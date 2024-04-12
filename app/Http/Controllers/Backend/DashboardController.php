<?php



namespace App\Http\Controllers\Backend;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Season;

use App\Models\Payment;
use App\Models\PaymentForProduct;

use App\Models\Fixture;
use App\Models\NewsAlerts;
use Illuminate\Support\Carbon;



class DashboardController extends Controller

{

    public function dashboard()

    {

        $total_user_count = User::where('role_as' , '0')->get()->count();

        $total_season_count = Season::get()->count();

        $get_total_amount = Payment::sum('amount');

        // $get_total_amount = $total_payment_count * 100;

        $get_users = User::where('role_as' , '0')->orderby('id' , 'desc')->limit(5)->get();

        // $get_upcoming_matches = Fixture::with('first_team_id' , 'second_team_id' , 'season')->limit(4)->get();

        $get_upcoming_matches = Fixture::where('date' ,'>' ,Carbon::now()->format('Y-m-d'))->with('first_team_id', 'second_team_id', 'season')

        ->inRandomOrder()->limit(5)->get();

        $get_product_amount =PaymentForProduct::sum('amount');



//  dd($get_upcoming_matches);

        return view('backend.dashboard' ,compact('total_user_count' , 'total_season_count' , 'get_total_amount' , 'get_users' , 'get_upcoming_matches' , 'get_product_amount'));

    }



    // public function user_management()

    // {

    //     $get_users = User::where('role_as' , '0')->orderBy('id' , 'desc')->get();

    //     //  dd($get_users);

    //      return view('backend.users.index' , compact('get_users'));



    // }


    public  function news_alerts() {
        $news_alerts = NewsAlerts::get();
        return view('backend.news_alert' , compact('news_alerts'));
    }


    // public  function news_alert_delete(Request $request) {

    //     NewsAlerts::where('id' , $request->id)->delete();
    //     return redirect()->back()->with('success_msg' , 'Email deleted successfully');
    // }



    public function deleteNewsAlerts($id)
    {
        try {

            $news_alerts =  NewsAlerts::find($id)->delete();
            if($news_alerts){
                return redirect()->back()->with('success_msg' , 'Email deleted successfully');
            }else{
                return redirect()->back()->with('message_error' , 'Something went wrong!');
            }
        } catch (\Exception $e) {
            if (!empty($e)) {
            return redirect()->back()->with('message_error' , 'Something went wrong!');
            }
        }

    }



}

