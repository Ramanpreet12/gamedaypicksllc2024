<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';
    protected $fillable = ['region' , 'position' , 'status'];
    //get order by pts of teams table for players's leaderboard on homepage
    public function teams()
    {
        return $this->hasMany(Team::class , 'region_id' , 'id')->orderBy('pts','desc');
    }


}
