<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season;

class UserTeam extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','leauge_id','season_id','week','team_id','points' , 'fixture_id' , 'user_region_id'];

    protected $append = ['season_name'];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    // public function getSeasonNameAtrribute()
    // {
    //     $season_name = Season::where('id',$this->team_id)->get();
    //     if($season_name){
    //         return $season_name->season_name;
    //     }else{
    //         return '';
    //     }
    // }

    public function getSeasonNameAttribute()
    {
        $season_name = Season::where('id',$this->season_id)->first();

    //    return 'asdasd';
        if($season_name){
            return $season_name->season_name;
        }else{
            return '';
        }
    }
}
