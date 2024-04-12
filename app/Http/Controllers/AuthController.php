<?php

namespace App\Http\Controllers;
use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Zipcode;
use App\Models\PreSignup;
use App\Models\UsaState;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\ForgotPassword;
use App\Mail\Signup;
use App\Mail\PreSignupMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\FogotPassword;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;
use App\Mail\Signup as Signup_class;
use App\Mail\ForgotPassword as password_forget;
use Exception;
use Cache ;

use Carbon\Carbon;


class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //user registration
     public function userRegister(Request $request)
    {

        $get_usa_states = UsaState::get();
       return view('front.register' , compact('get_usa_states'));
     }

     //user Signup

     public function new_reg(UserRegisterRequest $request)
     {
         if ($request->isMethod('post')){
            $dateOfBirth = $request->birthday;
            $get_age = Carbon::parse($dateOfBirth)->age;

             $count =  User::count();
             if ($count <1000) {

                 $group = 'A';

             } elseif(($count >=1000) &&($count <2000)) {
                 $group = 'B';

             }elseif(($count >=2000) &&($count <3000)) {
                 $group = 'C';

             }elseif(($count >=3000) &&($count <4000)) {
                 $group = 'D';
             }
             elseif(($count >=4000) &&($count <5000)) {
                 $group = 'E';
             }
             elseif(($count >=5000) &&($count <6000)) {
                 $group = 'F';
             }
             elseif(($count >=6000) &&($count <7000)) {
                 $group = 'G';
             }
             elseif(($count >=7000) &&($count <8000)) {
                 $group = 'H';
             }
             elseif(($count >=8000) &&($count <9000)) {
                 $group = 'I';
             }
             elseif(($count >=9000) &&($count <10000)) {
                 $group = 'J';
             }
             elseif(($count >=10000) &&($count <11000)) {
                 $group = 'K';
             }
             elseif(($count >=11000) &&($count <12000)) {
                 $group = 'L';
             }
             elseif(($count >=12000) &&($count <13000)) {
                 $group = 'M';
             }
             elseif(($count >=13000) &&($count <14000)) {
                 $group = 'N';
             }
             elseif(($count >=14000) &&($count <15000)) {
                 $group = 'O';
             }
             elseif(($count >=15000) &&($count <16000)) {
                 $group = 'P';
             }
             elseif(($count >=16000) &&($count <17000)) {
                 $group = 'Q';
             }
             elseif(($count >=17000) &&($count <18000)) {
                 $group = 'R';
             }
             elseif(($count >=18000) &&($count <19000)) {
                 $group = 'S';
             }
             elseif(($count >=19000) &&($count <20000)) {
                 $group = 'T';
             }
             elseif(($count >=20000) &&($count <21000)) {
                 $group = 'U';
             }
             elseif(($count >=21000) &&($count <22000)) {
                 $group = 'V';
             }
             elseif(($count >=22000) &&($count <23000)) {
                 $group = 'W';
             }
             elseif(($count >=23000) &&($count <24000)) {
                 $group = 'X';
             }
             elseif(($count >=24000) &&($count <25000)) {
                 $group = 'Y';
             }
             else{
              $group = 'Z';
             }
             $user_region_id =  '';
           $get_state = UsaState::where('id' , $request->state)->first();
           if ($request->state) {
               $user_region_id =  $get_state->region_id;
           }
           else{
               $user_region_id =6;
           }


             //if user select overseas country then store state_id as 50 , otherwise store state_id which is coming in request
             if ($request->state) {
               $state_id =  $request->state;
             } else {
               $state_id = 51;
             }
             if ($request->country == 'us') {
               $request->validate(['state' => 'required']);
            }
            // if user is registering with the same email of pre sign mail then we will update that email record with incoming requested data from Sign up page
            $get_pre_signup_user = PreSignup::where('email' , $request->email)->first();
            if (!empty($get_pre_signup_user) ) {
                $userID =User::where('email' , $request->email)->first();
                $update_userData = [
                    'team_id' => 0,
                  'name' => $request->fname,
                  'group' => $group,
                  'dob' => $request->birthday,
                  'age' => $get_age,
                  'email' => $request->email,
                  'password' => bcrypt($request->password),
                  'phone_number' => $request->phone,
                  'country_code' => $request->country_code,
                  'address' => $request->address,
                  'zipcode' => $request->zipcode,
                  'state' => $state_id,
                  'region_id' => $user_region_id,
                  'city' => $request->city,
                  'country' => $request->country,
                  'id_proof' => $request->id_proof,
                  'id_proof_number' => $request->id_proof_number,
                ];

            User::where('email' , $request->email)->update($update_userData);
            }
            else{
                $userData = [
                    'team_id' => 0,
                  'name' => $request->fname,
                  'group' => $group,
                  'dob' => $request->birthday,
                  'age' => $get_age,
                  'email' => $request->email,
                  'password' => bcrypt($request->password),
                  'phone_number' => $request->phone,
                  'country_code' => $request->country_code,
                  'address' => $request->address,
                  'zipcode' => $request->zipcode,
                  'state' => $state_id,
                  'region_id' => $user_region_id,
                  'city' => $request->city,
                  'country' => $request->country,
                  'id_proof' => $request->id_proof,
                  'id_proof_number' => $request->id_proof_number,
                ];
                $userID = User::create($userData);
            }

            // else{

                $usermailData  =  User::where('id', $userID->id)->first();
                if(Cache::has('leader_board_regions_wise_users_results')){
                    Cache::forget('leader_board_regions_wise_users_results');
                }
             Mail::to($usermailData->email)->send(new Signup_class($usermailData));
             return redirect()->route('login')->with('success' , 'registration sucessfull');
        //  }
       }
     }


    public function loginView()
    {
         return view('backend.admin_login', [
                'layout' => 'login'
            ]);

    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function login(LoginRequest $request )
    {
        if ($request->isMethod('post')) {
            if (\Auth::attempt(['email' => $request->email , 'password' => $request->password] ))  {
                return redirect('admin/dashboard')->with('message_success' , 'Login successfully');
            }else{
                return redirect('admin/login')->with('message_error' , 'Incorrect email or password');
               }
        }

    }

    //user  login
    public function UserLogin(Request $request)
    {
        if (!$request->isMethod('post')) {
            return view('front.login');
        } else {

                if (\Auth::attempt(['email' => $request->email , 'password' => $request->password , 'role_as' => 0] ))  {
                    if (\Auth::user()->role_as == 0) {
                        if (Auth::user()->age <= config('app.youth_age_limit')) {
                            return redirect()->route('pony-express-flag-football-shop')->with('success' , 'Login successfully');
                        } else {
                            return redirect()->route('dashboard')->with('success' , 'Login successfully');
                        }
                    }
                    else{
                        return redirect()->back()->with('userLogin_error' , 'Invalid email or password');
                    }
                }
               else{
                 return redirect('login')->with('userLogin_error' , 'Invalid email or password');
               }

            }
    }


    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Adminlogout()
    {
        if (Auth::user()->role_as == 1) {
            \Auth::logout();
            return redirect('admin/login');
        }

    }

    //user logout
    public function logout()
    {
        if (Auth::user()->role_as == 0) {
            \Auth::logout();
            return redirect('login');
        }
    }

    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email'
            ]);
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return redirect()->back()->with('error', 'Email address is invalid');
            } else {
                $token = Str::random(20);
                FogotPassword::create([
                    'email' => $request->email,
                    'token' => $token,
                ]);
                $data = ['email' => $request->email, 'token' => $token, 'user_name' => $user->name];
                Mail::to($request->email)->send(new password_forget($data));
                return redirect()->route('change_password')->with('success', 'Token is generate successfully check your email for update password');
            }
        } else {
            return view('front.forgot-password');
        }
    }
    public function changePassword(Request $request)
    {

        try {
            if ($request->isMethod('post')) {
                $request->validate([
                    'token'=>'required',
                    'password'=>'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                    'confirm' => 'required|min:6|same:password',
                ],
                [
                    'confirm.required' => 'The Confirm Password field is required',
                    'password.regex' => 'Password must contain at least one digit , one uppercase and one lowercase letter and  a special character',
                    'password.min:6' => 'Password must be at least 6 characters in length' ,

                ]);
                $pass = FogotPassword::where('token',$request->token)->first();
                if($pass){
                    $user = User::where('email',$pass->email)->update([
                        'password'=>bcrypt($request->password)
                    ]);
                    FogotPassword::where('id',$pass->id)->delete();
                    return redirect()->route('login')->with('success','Passowrd is updated successfully');
                }else{
                    return redirect()->back()->with('error','Invalid token');
                }
            }else{
                return view('front.changepassword');
            }
        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
    }


    // pre signup : sign up with only -> name , email , zipcode
    public function preSignUp(Request $request){

        if ($request->isMethod('post')) {
            // generate password with zipcode and random alphanumeric , special character numbers for pre signup user
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
            $random_password =  $request->zipcode.substr(str_shuffle($chars),0,8);
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:pre_signups,email',
                'zipcode' => 'required|regex:/\b\d{5}\b/',
                'age' => 'required|integer|min:10',
            ],[
                'zipcode.regex' => 'Zip Code should be 5 digits',
            ]
        );
            $user = User::create([
                'name' =>  $request->name,
                'email' =>  $request->email,
                'password' =>  bcrypt($random_password),
                'random_password' =>  $random_password,
                'zipcode' => $request->zipcode,
                'age' => $request->age,
            ]);

            $presignup = PreSignup::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'email' => $request->email,
                'zipcode' => $request->zipcode,
                'age' => $request->age,
            ]);
            // dd($user);
               Mail::to($user->email)->send(new PreSignupMail($user));
            return redirect()->route('login')->with('pre_signup_success','You have been Pre-signup successfully. Enter the Password you get on your email to login.');
        } else {
            return view('front.pre_sign_up');
        }
    }

    public function ponyFlagFootball(){
        $get_zipcodes = User::select('zipcode')->whereNotNull('zipcode')
                                ->where('zipcode','<>','')->where('role_as' , 0)->orderBy('id' , 'DESC')->get();


        // // get user table zipcode count
        // $get_users_zipcode_count = $get_zipcodes->count();
        // if ($get_users_zipcode_count < 20) {
        //     // get zipcodes from zipcode table
        //     $limit = 20 - $get_users_zipcode_count;
        //     $get_zipcodes_from_table = Zipcode::limit( $limit)->inRandomOrder()->get();
        //     $collection = collect($get_zipcodes);
        //     $show_zipcodes = $collection->merge( $get_zipcodes_from_table);
        // }
        // elseif($get_users_zipcode_count >= 20){
        //     $show_zipcodes = $get_zipcodes;
        // }

        // get pony page details from backend
        $get_pony_page_details = GeneralSetting::where('type', 'pony_page')->get()->toArray();
        $pony_page_details = key_value('name', 'value', $get_pony_page_details);



        return view('front.pony_flag_football_league' , compact('get_zipcodes' , 'pony_page_details'));
    }


}
