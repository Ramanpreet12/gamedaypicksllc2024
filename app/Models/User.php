<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'random_password' , 'dob', 'age' , 'phone_number',  'country_code', 'group' , 'address' , 'city' , 'state' , 'zipcode' , 'country' , 'id_proof_number' , 'id_proof' , 'region_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that appends to returned entities.
     *
     * @var array
     */
    // protected $appends = ['photo_path', 'team_status', 'season'];
    protected $appends = ['photo_path'];

    /**
     * The getter that return accessible URL for user photo.
     *
     * @var array
     */
    public function getPhotoPathAttribute()
    {
        if (($this->photo !== null) && (Storage::exists('storage/admin_profile_photo/' . $this->photo))) {
            return url('/storage/admin_profile_photo/' . $this->photo);
        } else {
            return url('/dist/images/dummy_image.webp');
        }
    }
public function userteam()
{
   return $this->hasMany(UserTeam::class);
}
    public function Team()
    {
        return $this->belongsTo(Team::class);
    }
    public function Payment()
    {
        return $this->hasMany(Payment::class);
    }
    // public function getTeamStatusAttribute()
    // {
    //     $c_date = Carbon::now();
    //     $c_season = DB::table('seasons')
    //         ->whereRaw('"' . $c_date . '" between `starting` and `ending`')
    //         ->first();

    //     $points = DB::table('user_details')->where(['user_id'=>auth()->user()->id,'season_id'=>$c_season->id])->value('points');
    //     if($points){
    //         return $points;
    //     }else{
    //         return 0;
    //     }
    // }

    // public function getSeasonAttribute()
    // {
    //     $c_date = Carbon::now();
    //     $c_season = DB::table('seasons')
    //         ->whereRaw('"' . $c_date . '" between `starting` and `ending`')
    //         ->first();
    //     if ($c_season) {
    //         return $c_season->name;
    //     } else {
    //         return '';
    //     }
    // }

    public function winner()
    {
        return $this->hasOne(Winner::class , 'user_id' , 'id');
    }
}


