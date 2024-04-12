<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Validator;
use Storage;
use App\Http\Requests\BannerRequest;
use Illuminate\Foundation\Bootstrap\HandleExceptions;


class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::get();
        return view('backend.site_setting.banner.index' , compact('banners'));
    }

    public function create()
    {
        return view('backend.site_setting.banner.create');
    }

    public function store(BannerRequest $request)
    {
        try {
            if($request->isMethod('post')) {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');

                    $filename = "banner_".time().'.'.$image->getClientOriginalExtension();
                    $success = $image->storeAs('public/images/banners/' , $filename);
                    if (!isset($success)) {
                        return back()->withError('Could not upload Banner');
                    }
                }
                $banners = new Banner;
                $banners->heading  = $request->heading;
                $banners->image    = $filename;
                $banners->serial   = $request->serial;
                $banners->status   = $request->status;
                $banners->save();
                return redirect('admin/banner')->with('success' , 'Banner added successfully');
        }
        } catch (\Exception $e) {
            dd($e);
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $banners = Banner::find($id);
        return view('backend.site_setting.banner.edit', compact('banners'));
    }

    public function update(BannerRequest $request , $id)
    {
        try{
        if ($request->isMethod('put')) {
            $data = array();
                $image     =   $request->file('image');

                if ($image) {
                    $extension =   $image->getClientOriginalExtension();

                    if ($extension == null) {
                        return redirect()->back()->with('message_error' , 'Invalid image file type.');
                    } else {



                    $filename  =   'banner_'.time() . '.' . $extension;
                    $success = $image->storeAs('public/images/banners/' , $filename);
                    if (!isset($success)) {
                        return back()->withError('Could not upload Banner');
                    }
                    $data["image"]=$filename;
                }
                }

                $data["heading"]=$request->heading;
                $data["serial"]=$request->serial;
                $data["status"]=$request->status;
                $result=Banner::where('id',$id)->update($data);
                return redirect('admin/banner')->with('success' , 'Banner updated successfully');;
        }

    } catch (\Exception $e) {
        if (!empty($e)) {
          return redirect()->back()->with('message_error' , 'Something went wrong!');
        }
    }

    }

    public function destroy($id)
    {

        //     //$banners   = Banners::find($request->id);
        //     // $file_path = public_path().'/front/images/banners/'.$banners->image;
        //     // if (file_exists($file_path)) {
        //     //     unlink($file_path);
        //     // }
        //     Banner::find($id)->delete();
        // return redirect('admin/banner')->with('success' , 'Banner deleted successfully');;
    }

    public function deleteBanner($id)
    {
        try {
            //get Image
         $banner_image = Banner::whereId($id)->first();

         $Images_path = storage_path('app/public/images/banners/');

          //delete image from folder
            unlink_image_video_from_db($Images_path , $banner_image->image);

            $banners =  Banner::find($id)->delete();
            if($banners){
                return redirect()->route('banner.index')->with('success' , 'Banner deleted successfully');
            }else{
            return redirect()->route('banner.index')->with('message_error', 'Something went wrong!');
            }
        } catch (\Exception $e) {
            if (!empty($e)) {
            return redirect()->back()->with('message_error' , 'Something went wrong!');
            }
        }

    }

}
