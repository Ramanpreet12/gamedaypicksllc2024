<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Winner extends Model
{
    use HasFactory;
    protected $fillable = [
        'season_id', 'user_id', 'prize_id','total_points'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function prize()
    {
        return $this->belongsTo(Prize::class , 'prize_id' , 'id');
    }

    public function season()
    {
        return $this->belongsTo(Season::class , 'season_id' , 'id');
    }
}
