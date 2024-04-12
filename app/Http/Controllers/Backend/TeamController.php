<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Requests\TeamValidation;
use Storage;
use App\Models\Region;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::with('region')->get();
        return view('backend.team.index' , compact('teams'));
    }

    public function create(){
        $get_regions = Region::where('status' , 'active')->get();
        return view('backend.team.create' , compact('get_regions'));
    }
    public function store(TeamValidation $request){
         try{
            if ($request->isMethod('post')) {
                $input = $request->all();
                    if ($request->hasFile('logo')) {
                            $logo_file = $request->file('logo');
                            // $logo_filename = "teamlogo".time().'.'.$logo_file->getClientOriginalExtension();
                            $logo_filename = $logo_file->getClientOriginalName();
                            $image_file_name = str_replace( " ", "-", $logo_filename );
                            $logo_file->storeAs('public/images/team_logo/' , $image_file_name);
                            $input['logo'] = $image_file_name;
                    }
                $team = Team::create($input);
                if($team){
                    return redirect()->route('team.index')->with('success_msg', 'Team created successfully');
                }
                else{
                    return redirect()->route('team.index')->with('error_msg', 'Something went wrong');
                }

            }
        }catch(\Exception $e){
            $e->getMessage();
        }
    }
    public function edit($id){
        $get_regions = Region::where('status' , 'active')->get();
        $team = Team::find($id);
        // dd($team);
        return view('backend.team.edit', compact('team' , 'get_regions'));
    }

    public function update(TeamValidation $request, $id){
        try{
            if ($request->isMethod('put')) {
                $data = array();
                    $image     =   $request->file('logo');
                    if ($image) {
                        // $extension =   $image->getClientOriginalExtension();
                        // $filename  =   'teamlogo_'.time() . '.' . $extension;
                        $filename = $image->getClientOriginalName();
                        $image_file_name = str_replace( " ", "-", $filename );
                        $success = $image->storeAs('public/images/team_logo/' , $image_file_name);
                        if (!isset($success)) {
                            return back()->withError('Could not upload logo');
                        }
                        $data["logo"]=$image_file_name;
                    }

                    $data["region_id"]=$request->region_id;
                    $data["league"]=$request->league;
                    $data["name"]=$request->name;
                    $data["status"]=$request->status;
                    $result=Team::where('id',$id)->update($data);
                    if($result){
                        return redirect()->route('team.index')->with('success_msg', 'Team updated successfully');
                    }
                    else{
                        return redirect()->route('team.index')->with('error_msg', 'Something went wrong');
                    }
                }
            }catch(\Exception $e){
                $e->getMessage();
            }

    }


    public function destroy($id){

    }

    public function deleteTeam($id){
        Team::whereId($id)->delete();
        return redirect()->route('team.index')->with('success_msg', 'Team deleted successfully');
    }
}
