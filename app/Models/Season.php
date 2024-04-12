<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['season_name','league','starting','ending' , 'status' ,'season_amount'];

    public function fixture(){
        return $this->hasMany(Fixture::class);
    }


    public function winner()
    {
        return $this->hasOne(Winner::class , 'season_id' , 'id');
    }

    public function prize()
    {
        return $this->hasMany(Season::class , 'season_id' , 'id');
    }

}
