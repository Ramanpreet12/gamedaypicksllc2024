<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (!$request->isMethod('post')) {
            return view('front.login');
        } else {
                if (\Auth::attempt(['email' => $request->email , 'password' => $request->password] ))  {
                    return redirect('dashboard')->with('success' , 'Login successfully');
                }
                   else{
                    return redirect('login')->with('error' , 'Failed to login');
                   }

        }


    }
}
