<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Player::with('teams')->get();
        // echo "<pre>";
        // print_r($players);
        // die();
        return view('backend.players.index' , compact('players'));
    }
}
