<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Storage;
use Hash;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Validator;

class AdminSettingController extends Controller
{
    public function profile(Request $request)
    {
        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone_number' => 'required',
            ]);
            $fieldnames = array(
                'name' => 'Name' ,
                'phone_number' => 'Phone Number'
            );
            $validator->setAttributeNames($fieldnames);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else{

                //upload admin profile photo
                if ($request->hasFile('photo')) {
                    $file = $request->file('photo');
                    $filename = time().'.'.$file->getClientOriginalExtension();
                    $file->storeAs('public/admin_profile_photo' , $filename);

                    $image_path = 'public/admin_profile_photo/'.Auth::user()->photo;
                   if (Storage::exists($image_path)) {
                   Storage::delete($image_path);
                   } else {
                    $file = $request->file('photo');
                    $filename = time().'.'.$file->getClientOriginalExtension();
                    $file->storeAs('public/admin_profile_photo' , $filename);
                    // dd('file does not exists');
                    // return redirect()->back()->with('error' , 'something is wrong while updating the image');
                   }

                //   $file = $request->file('photo');
                //   $filename = time().'.'.$file->getClientOriginalExtension();
                //   $file->storeAs('public/admin_profile_photo' , $filename);
                }
                else if(!empty('current_photo')){
                    $filename = $request->current_photo;
                }
                else{
                    $filename ="";
                }

             User::where('id' , Auth::user()->id)->update(['name' => $request->name ,'photo' => $filename , 'phone_number' => $request->phone_number ]);
            return redirect()->back()->with('success' , 'Profile Updated Successfully');
        }
        } else {
            return view('backend.admin_setting.admin_profile');
        }
    }

    // public function changePassword(Request $request)
    // {
    //     if ($request->isMethod('post')) {
    //         $validator = Validator::make($request->all(), [
    //             'current_password' => 'required',
    //             'new_password' => 'required',
    //             'confirm_password' => 'required|same:new_password'
    //         ]);
    //         $fieldnames = array(
    //             'current_password' => 'Current Password' ,
    //             'new_password' => 'New Password',
    //             'confirm_password' => 'Confirm Password'
    //         );
    //         $validator->setAttributeNames($fieldnames);
    //         if ($validator->fails()) {
    //             return redirect()->back()->withErrors($validator)->withInput();
    //         }

    //         else{
    //         if (!(Hash::check($request->current_password ,Auth::user()->password))) {
    //             return redirect()->back()->with('message_error' , 'Current password is incorrect');
    //         }
    //         if (($request->current_password === $request->new_password)) {
    //             return redirect()->back()->with('message_error' , 'New Password cannot be same as your current password');
    //         }
    //             User::where('id' , Auth::user()->id)->update(['password' => bcrypt($request->new_password)]);
    //             return redirect()->back()->with('success' , 'Password updated successfully');
    //     }
    //     }
    //     else{
    //         return view('backend.admin_password');
    //     }

    // }
    public function password()
    {
        return view('backend.admin_setting.admin_password');
    }
    public function updatePassword(PasswordRequest $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            if (!(Hash::check($request->current_password ,Auth::user()->password))) {
                return redirect()->back()->with('message_error' , 'Current password is incorrect');
            }
            if (($request->current_password === $request->new_password)) {
               return redirect()->back()->with('message_error' , 'New Password cannot be same as your current password');
            }
            User::where('id' , Auth::user()->id)->update(['password' => bcrypt($request->new_password)]);
            return redirect()->back()->with('success' , 'Password updated successfully');

        }
    }

}
