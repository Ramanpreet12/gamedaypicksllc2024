<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchResult extends Model
{
    use HasFactory;
    protected $table = 'match_results';
    protected $fillable = ['page_heading','selected_season_heading','select_season_heading','total_player_heading' , 'region_heading' , 'players_total_win' , 'players_total_loss' ];
}
