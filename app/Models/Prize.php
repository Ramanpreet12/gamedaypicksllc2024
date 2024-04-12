<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Prize extends Model

{

    use HasFactory;

    protected $fillable = ['season_id','name','amount' , 'image' , 'content' , 'prize_date' , 'status'];



    // protected $appends = ['season_name','team_name','player_name'];



    public function season(){

        return $this->belongsTo('App\Models\Season','season_id');

    }



    // public function getSeasonNameAttribute(){

    //     $name = \App\Models\Season::where('id',$this->season_id)->value('name');

    // return ucwords($name) ?? '';

    // }



    // public function getTeamNameAttribute(){

    //     $name = \App\Models\Team::where('id',$this->team_id)->value('name');

    // return ucwords($name) ?? '';

    // }



    // public function getPlayerNameAttribute(){

    //     $name = \App\Models\Player::where('id',$this->player_id)->value('name');

    // return ucwords($name) ?? '';

    // }



    public function winner()

    {

        return $this->hasOne(Winner::class , 'prize_id' , 'id');

    }

}

