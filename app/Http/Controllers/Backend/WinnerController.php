<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\UserTeam;
use App\Models\Prize;
use App\Models\Winner;
use App\Models\User;


class WinnerController extends Controller
{
    public function index(){

       $get_users =  DB::table('user_teams')
       ->join('users' , 'users.id' , '=' , 'user_teams.user_id')
    //    ->join('regions' , 'regions.id' , '=' , 'users.region_id')
       ->join('seasons' ,'seasons.id', '=' , 'user_teams.season_id')
       ->where('points' , 1)
        ->select(DB::raw('sum(points) as winning_points'),'users.name as user_name' , 'users.id as user_id' , 'users.email as user_email', 'users.photo as user_photo' , 'seasons.season_name as season_name')
        // ->select(DB::raw('sum(points) as winning_points'),'regions.region as user_region' , 'users.name as user_name' , 'users.id as user_id' , 'users.email as user_email', 'users.photo as user_photo' , 'seasons.season_name as season_name')

        ->orderBy('winning_points' , 'desc')
        ->groupBy(DB::raw('user_id') )
        ->get();

        // dd($get_users);

        return view('backend.winner.index',compact('get_users'));
    }
    public function assign_prize($id)
    {
    //    $get_winning_user = UserTeam::where('user_id' , $id)->with('user')->first();
    $get_winning_user =  DB::table('user_teams')
       ->join('users' , 'users.id' , '=' , 'user_teams.user_id')
       ->join('seasons' ,'seasons.id', '=' , 'user_teams.season_id')
       ->where('points' , 1)
        ->select(DB::raw('sum(points) as total_points' ),'users.*' , 'user_teams.*' ,  'seasons.season_name as season_name' )
        ->groupBy(DB::raw('user_id') )->where('user_id' , $id)
        ->first();

       $get_prizes = Prize::where('status' , 'active')->orderBy('id' , 'desc')->get();

        return view('backend.winner.create' , compact('get_winning_user' , 'get_prizes'));
    }
    public function assigned_prize_store(Request $request , $id)
    {
        // try{
            if ($request->isMethod('post')) {
                $input = $request->all();
                $validatedData = $request->validate([
                    'prize_id' => 'required',
                ],
                [
                 'prize_id.required'=> 'The Prize field is required',
                ]
                );
                $winner = Winner::create($input);
                if($winner){
                    return redirect('admin/winner')->with('success_msg', 'Prize assign to winner successfully');
                }
                else{
                    return redirect('admin/winner')->with('error_msg', 'Something went wrong');
                }

            }
        // }catch(\Exception $e){
        //     $e->getMessage();
        // }
    }

    public function view_winners()
    {
        $get_winners = Winner::with(['user' , 'prize' , 'season'])->get();


        return view('backend.winner.view_winners' , compact('get_winners'));
    }
    public function edit($id)
    {
        $get_prize_assigned_to_user = Winner::with(['user' , 'prize' , 'season'])->where('id', $id)->first();
        // dd($get_prize_assigned_to_user);
        $get_prizes = Prize::where('status' , 'active')->orderBy('id' , 'desc')->get();
        return view('backend.winner.edit' , compact('get_prize_assigned_to_user' , 'get_prizes'));
    }

    public function show($id)
    {

    }


    public function update(Request $request , $id)
    {
        if ($request->isMethod('put')) {

            // dd($request);

            $input = $request->all();
            // $winner = Winner::create($input);
            $winner = Winner::where('id' , $id)->update([
                'season_id' => $request->season_id,
                'user_id' => $request->user_id,
                'prize_id' => $request->prize_id,
            ]);
            if($winner){
                return redirect('admin/view_winners')->with('success_msg', 'Assigned prize updated successfully');
            }
            else{
                return redirect('admin/view_winners')->with('error_msg', 'Something went wrong');
            }

        }
    }

    public function destroy($id)
    {

        // Winner::find($id)->delete();
        // return redirect('admin/view_winners')->with('success_msg' , 'Winner Prize deleted successfully');
    }


    public function deleteView_winner($id)
    {
        try {

            $winner =  Winner::find($id)->delete();
            if($winner){
                return redirect()->route('view_winners')->with('success' , 'Winner prize removed successfully');
            }else{
            return redirect()->back()->with('message_error', 'Something went wrong!');
            }
        } catch (\Exception $e) {
            if (!empty($e)) {
            return redirect()->back()->with('message_error' , 'Something went wrong!');
            }
        }

    }


}
