<?php

namespace App\Http\Controllers;
use App\Models\Jersey;
use App\Models\PreSignup;
use App\Models\PaymentForJersey;
use Auth;
use Log;
use DB;
use GuzzleHttp\Client;
use App\Mail\JerseyBuyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Bootstrap\HandleExceptions;
use App\Models\Coupon;
use App\Models\AdminJersey;
use App\Models\ReserveJersey;
use Validator;
use Carbon\Carbon;


use Illuminate\Http\Request;

class JerseyController extends Controller
{
    private $currency = "USD";

    public function __construct()
    {
        // Closure as callback
        $this->payment_mode = env('PAYMENT_MODE');

    }


    /**
     * returns the private key for clover payment
     */
    private function getThePrivateKey(){
        return $this->payment_mode == "TEST"? env('CLOVER_PRIVATE_KEY'):env('CLOVER_PRIVATE_KEY_PRODUCTION');
    }

    /**
     * returns the url for the clover payment charge
     */


     private function getTheChargeUrl(){
        return $this->payment_mode == "TEST" ? 'https://scl-sandbox.dev.clover.com/v1/charges': 'https://scl.clover.com/v1/charges';

     }





    // add to cart jersey / reserve jersey

    public function reserveJersey(Request $request){


        // dd($request);
         // check jersey number for each age group
         $get_number_count =strlen($request->jersey_number) ;

         if ($get_number_count < 2 && $request->jersey_number == '0' ) {
           $jersey_number = '0';
         } elseif($get_number_count == 2 && $request->jersey_number == '00' ) {
          $jersey_number = '00';
         }
         elseif($get_number_count == 0 && $request->jersey_number == null ) {
            $jersey_number = '';
           }
         else{
          $jersey_number = sprintf("%02d", $request->jersey_number);
         }

        // no checks for adults
        //  if(!$request->age_group == 3){
        // //  check if it is already purchased by someone
        //  $already_buy_jersey = Jersey::where(['jersey_number' => $jersey_number , 'age_group' => $request->age_group , 'zipcode' =>Auth::user()->zipcode])->first();


        // // check if it is already reserved by someone

        //  $already_reserved_jersey = ReserveJersey::where(['jersey_number' => $jersey_number , 'age_group' => $request->age_group , 'zipcode' =>Auth::user()->zipcode])->first();

        //  if ($already_buy_jersey) {
        //     return response()->json(['message' => 'out_of_stock','status'=>false , 'jersey_number' =>  $jersey_number ], 200);

        //  } elseif($already_reserved_jersey) {
        //     return response()->json(['message' => 'already_reserved','status'=>false , 'jersey_number' =>  $jersey_number ], 200);

        //  }
        // }

        $age_group_1 = DB::table('reserve_jerseys')->where(['size'=>  '10-13', 'zipcode' =>$request->zipcode] )->get()->count();
        $age_group_2 = DB::table('reserve_jerseys')->where(['size' => '14-17' , 'zipcode' => $request->zipcode] )->get()->count();

          //  claim their number per zip code from 101 numbers available 0-99 and 00. Once those numbers are all picked that zip code picking is locked for that year
            if ($request->size == '10-13' &&  $age_group_1 == config('app.kid_jersey_limit_for_each_group')) {
            return response()->json(['message' => 'out_of_stock_for_10_to_13','status'=>false , 'jersey_number' =>  $jersey_number ], 200);
          }
          elseif($request->size == '14-17' && $age_group_2 == config('app.kid_jersey_limit_for_each_group')) {
            return response()->json(['message' => 'out_of_stock_for_14_to_17','status'=>false , 'jersey_number' =>  $jersey_number ], 200);
          }


          if($request->size == '10-13' OR $request->size == '14-17' ){
            $validation =  $request->merge(["jersey_number"=>$jersey_number]);
            $validation =  $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:reserve_jerseys,email',
            // 'jersey_number' => 'required|numeric|max:99|unique:jerseys,jersey_number ',
            'jersey_number' => 'required|numeric|max:99|unique:reserve_jerseys,jersey_number,NULL,id,size,'
            .$request->size. ',zipcode,' .$request->zipcode,
            // 'gender' => 'required',
            // 'age_group' => 'required',
            'size' => 'required',
        ]);


        }else{
            $validation =  $request->validate([
                'name' => 'required',
                // 'email' => 'required|email|unique:reserve_jerseys,email',
                // 'jersey_number' => 'required|numeric|max:99|unique:jerseys,jersey_number ',
                'jersey_number' => 'required|numeric|max:99',
                'gender' => 'required',
                // 'age_group' => 'required',
                'size' => 'required',
            ]);
    }

        $reserve_jersey = ReserveJersey::create([
            'user_id' => Auth::user()->id,
            'admin_jersey_id' => $request->jersey_id,
            'email' => Auth::user()->email,
            'zipcode' => Auth::user()->zipcode,
            'name' => $request->name,
            'jersey_name' => $request->jersey_name,
            'jersey_image' => $request->jersey_image,
            'jersey_number' => $jersey_number,
            'jersey_price' => $request->jersey_price,
            'size' => $request->size,
            // 'gender' => $request->gender,
            'gender' => 'youth',
            'reserved_date' => Carbon::now()->format('Y-m-d')


        ]);


        return response()->json([
            'success'=>true, 'message' => 'reserved' , 'jersey_number' => $jersey_number
        ],200);
    }


    public function jerseyForKid(){
        return 'hello';
    }



}
