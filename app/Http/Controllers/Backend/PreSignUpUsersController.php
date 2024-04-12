<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PreSignup;
use App\Models\PaymentForJersey;
use DB;

class PreSignUpUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pre_signup_users = PreSignup::get();

        return view('backend.pre_sign_up_users.index' , compact('pre_signup_users'));
    }

    public function pre_user_paymentdetails($id){
        // $payment_for_jersey = PaymentForJersey::whereId($id)->first();
        // dd($id);
        $orderDetails = DB::table('jerseys')
                        ->join('payment_for_jerseys', 'payment_for_jerseys.pre_signup_user_id','=', 'jerseys.pre_signups_id')

                        ->where(['payment_for_jerseys.pre_signup_user_id' => $id])
                        ->select('payment_for_jerseys.*','jerseys.name','jerseys.email','jerseys.jersey_number','jerseys.gender','jerseys.size')
                        ->first();

        // dd($orderDetails);
        if ($orderDetails == null) {
           return view('main-error-page');
        } else {
            return view('backend.pre_sign_up_users.payment' , compact('orderDetails'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
