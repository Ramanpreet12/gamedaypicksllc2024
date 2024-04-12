<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchResult;
use App\Http\Requests\MatchResultRequest;

class MatchResultController extends Controller
{
    public function match_result() {
        $match_result = MatchResult::first();
        return view('backend.site_setting.match_result_region' , compact('match_result'));
    }

    public function match_result_edit(MatchResultRequest $request)
    {

        // try {
                 $match_result = MatchResult::first();
                $updateDetails = [
                    'page_heading' => $request->get('page_heading'),
                    'selected_season_heading' => $request->get('selected_season_heading'),
                    'select_season_heading' => $request->get('select_season_heading'),
                    'total_player_heading' => $request->get('total_player_heading'),
                    'region_heading' => $request->get('region_heading'),
                    'players_total_win' => $request->get('players_total_win'),
                    'players_total_loss' => $request->get('players_total_loss'),
                ];


              $update_query =   $match_result->update($updateDetails);
              if ($update_query) {
                return redirect()->back()->with('success' , 'Match Results setting updated successfully');
              } else {
                return redirect()->back()->with('message_error' , 'Something went wrong');
              }

            // } catch (\Exception $e) {
            //         $e->getMessage();
            //         }

                }



}
