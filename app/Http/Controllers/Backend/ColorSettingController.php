<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorSetting;
use App\Http\Requests\ColorSettingRequest;


class ColorSettingController extends Controller
{
    public function index(){
        $color_setting = ColorSetting::get();

        return view('backend.site_setting.color_setting.index' , compact('color_setting'));
    }



    public function edit_color($id){
        $color_setting = ColorSetting::where('id' , $id)->first();
        $color_section=['header'=>'header','navbar'=>'navbar','scoreboard'=>'scoreboard','leaderboard'=>'leaderboard','video'=>'video','news'=>'news','footer'=>'footer'];
        return view('backend.site_setting.color_setting.edit' , compact('color_setting','color_section'));
    }
    public function update_color(ColorSettingRequest $request , $id){

        // print_r($request->all());exit;
        if($request->isMethod('post')){
            ColorSetting::where('id' , $id)->update([
                //'section' => $request->section,
                'header_color' => $request->header_color,
                'text_color' => $request->text_color,
                'button_color' => $request->button_color,
                'bg_color' => $request->bg_color,
                'status' => $request->status,
            ]);
            return redirect('admin/color_setting')->with('message_success' , 'Color updated successfully');
        }
    }


}
