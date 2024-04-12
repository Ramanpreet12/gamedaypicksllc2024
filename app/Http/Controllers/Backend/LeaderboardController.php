<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leaderboard;
use App\Models\Team;
use App\Models\Player;
use Validator;
use App\Models\SectionHeading;

class LeaderboardController extends Controller
{
    public function section_heading(Request $request)
    {
        if ($request->isMethod('post')) {
            SectionHeading::where('name' , 'leaderboard')->update([
                        'value' => $request->section_heading,]);
        return redirect('admin/leaderboard')->with('success' , 'Leaderboard title updated successfully');
        }
    }

    public function index()
    {
        // $leaderboards = Leaderboard::where('status' , 'active')->get();
        // $leaderHeading = SectionHeading::where('name' , 'Leaderboard')->first();
        // return view('backend.site_setting.leaderboard.index' , compact('leaderboards'  , 'leaderHeading'))
        $players = Player::with('teams')->get();
        $leaderHeading = SectionHeading::where('name' , 'Leaderboard')->first();
         return view('backend.site_setting.leaderboard.index' , compact('players' , 'leaderHeading'));;
    }

    public function leaderboard_data()
    {
        $leaderboards = Leaderboard::with('teams')->paginate(6);
       // dd($leaderboards);
         return response()->json($leaderboards , 200);
    }

    public function create(Request $request)
    {
        if (! $request->isMethod('post')) {
            $teams = Team::get();
        return view('backend.site_setting.leaderboard.create' , compact('teams'));

        } elseif ($request->isMethod('post')) {
            $rules = array(
                ''    => '',
            );
            $fieldNames = array(
                ''    => '',
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $leader = new Leaderboard;

                $leader->team_id  = $request->teams;
                $leader->region   = $request->region;
                $leader->win   = $request->win;
                $leader->loss  = $request->loss;
                $leader->pts   = $request->pts;
                $leader->status   = $request->status;
                $leader->save();
                return redirect('admin/leaderboard')->with('success' , 'Leaderboard Record added successfully');
            }
        } else {
            return redirect('admin/leaderboard/create')->with('message_error' , 'Something went wrong');
        }
    }

    public function edit(Request $request , $id){

        if(!$request->isMethod('post')){
            $leaderboard = Leaderboard::where('id' , $id)->first();
            $teams = Team::get();
        return view('backend.site_setting.leaderboard.edit' , compact('leaderboard','teams' ));
        }
        else{
            Leaderboard::where('id' , $id)->update([
                'team_id' => $request->teams,
                'region' => $request->region,
                'win' => $request->win,
                'loss' => $request->loss,
                'pts' => $request->pts,
                'status' => $request->status,

            ]);
            return redirect('admin/leaderboard')->with('success' , 'Leaderboard Record updated successfully');
        }
    }

    public function delete($id){
        Leaderboard::where('id' , $id)->delete();
        return redirect()->back()->with('success' , 'Leaderboard Record deleted successfully');
    }





}
