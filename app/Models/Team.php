<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable =['league' , 'region_id' , 'name','logo','match_played','win','loss', 'pts' , 'status'];
    protected $appends = ['image' , 'player_name'];

    public function getImageAttribute() {
        // $image = env('APP_URL').'/storage/images/team_logo'.$this->logo;
        // return $image;

        if (($this->logo !== null)) {
            return url('/storage/images/team_logo/'.$this->logo);
        } else {
            return url('/dist/images/dummy_image.webp');
        }
    }

    public function fixture_team_one()
    {
        return $this->hasMany(Fixture::class ,'first_team' , 'id' );
    }
    public function fixture_team_two()
    {
        return $this->hasMany(Fixture::class ,'second_team' , 'id' );
    }

    public function team_result_one()
    {
        return $this->hasMany(TeamResult::class ,'team1_id' , 'id' );
    }
    public function team_result_two()
    {
        return $this->hasMany(TeamResult::class ,'team2_id' , 'id' );
    }
    public function leaderboard()
    {
        return $this->hasOne(Leaderboard::class, 'id');
    }

    public function player()
    {
        return $this->hasMany(Player::class , 'team_id' , 'id');
    }

    //get region for player's leaderboard on home page
    public function region()
    {
        return $this->belongsTo(Region::class , 'region_id' , 'id');
    }

    //get playername for player's leaderboard on home page
    public function getPlayerNameAttribute()
    {
        $data =  \DB::table('users')->where('team_id',$this->id)->get('name');
        return $data;
    }

}
