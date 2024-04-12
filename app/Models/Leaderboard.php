<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Team;

class Leaderboard extends Model
{
    use HasFactory;

    protected $table = 'leaderboards';
    protected $fillable = ['team_id','region','win' , 'loss' , 'pts' , 'status'];
    // protected $appends = ['team_logo'];

    public function teams(){
        return $this->belongsTo(Team::class , 'team_id');
    }

    // public function getTeamLogoAttribute()
    // {

    //     if ($this->teams->logo !== null) {
    //         return url('/storage/images/team_logo/'.$this->teams->logo);
    //     } else {
    //         return url('/dist/images/dummy_image.webp');
    //     }
    // }



}
