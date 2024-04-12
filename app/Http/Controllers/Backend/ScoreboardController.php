<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fixture;
use App\Models\Team;

class ScoreboardController extends Controller
{
    public function index()
    {
        $fixtures =  Fixture::with('first_team_id' , 'second_team_id' , 'season')->get();
        return view('backend.scoreboard.index' , compact('fixtures'));
    }

    // public function add_scores(Request $request , $id)
    // {
    //     dd($request);
    //     Fixture::where('id' , $id)->update([

    //         'first_team_points' => $request->first_team_points,
    //         'second_team_points' => $request->second_team_points,
    //     ]);
    //     return redirect('admin/scores')->with('success', 'Scores Added successfully');

    // }

    public function add_scores(Request $request, $id)
    {
        if (!$request->isMethod('post')) {
           $team_results =  Fixture::with('first_team_id' , 'second_team_id' , 'season')->where('id', $id)->first();
            $teams = Team::get();

            return view('backend.scoreboard.create', compact('team_results', 'teams'));
        } else {
          $fixture_data =   Fixture::where('id' , $id)->first();
            Fixture::where('id' , $id)->update([
                'first_team_points' => $request->first_team_points,
                'second_team_points' => $request->second_team_points,
            ]);
            return redirect('admin/scores')->with('success', 'Scores Added successfully');
        }
    }

}
