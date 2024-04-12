<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['team_id','name'];
    protected $appends = ['team_logo'];

    public function teams()
    {
        return $this->belongsTo(Team::class , 'team_id' , 'id');
    }

    public function getTeamLogoAttribute()
    {

        if ($this->teams->logo !== null) {
            return url('/storage/images/team_logo/'.$this->teams->logo);
        } else {
            return url('/dist/images/dummy_image.webp');
        }
    }


}
