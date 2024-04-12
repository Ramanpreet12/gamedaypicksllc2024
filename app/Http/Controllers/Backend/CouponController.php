<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;


class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons =  Coupon::orderby('id' , 'desc')->get();
        return view('backend.coupons', compact('coupons'));
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

         $random_couponCode = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 16);
       // $random_couponCode = rand(1 , 3);
        // dd($random_couponCode);
        // if (Coupon::where('coupon_code', '=', $random_couponCode->exists())) {
        //     return redirect()->back()->with('message_error' , 'Coupon already exists. Please try again! ');

        //  }
        if (Coupon::where('coupon_code', $random_couponCode )->exists()) {
            return redirect()->back()->with('message_error' , 'Coupon already exists. Please try again! ');

        }

        Coupon::create([
            'coupon_code' => $random_couponCode,
        ]);
        return redirect()->back()->with('success' , 'Coupon genereted successfully');

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
        Coupon::find($id)->delete();
        return redirect()->back()->with('success' , 'Coupon deleted successfully');

    }
}
