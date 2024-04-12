<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamResult extends Model
{
    use HasFactory;
    protected $table = 'team_results';
    protected $fillable = ['team1_id','team2_id','team1_score' , 'team2_score' , 'result_status' , 'status'];

    public function team_result_id1(){
        return $this->belongsTo(Team::class , 'team1_id' , 'id');
    }
    public function team_result_id2(){
        return $this->belongsTo(Team::class , 'team2_id' , 'id');
    }

}
