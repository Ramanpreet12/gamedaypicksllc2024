<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;



class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'season_id', 'amount', 'transaction_id','payment_method', 'status', 'currency', 'clover_payment_created_timestamp', 'ref_num', 'exp_month_card', 'exp_year_card', 'first6_digit_of_card' ,'last4_digit_of_card' ,'clover_payment_intiation_id'];

    protected $appends = ['user_name','invoice'];

    public function getCreatedDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
    // public function User()
    // {
    //     return $this->belongsToMany(User::class);
    // }
    public function getUserNameAttribute()
    {
       $name = User::where('id',$this->user_id)->value('name');
       if($name){
        return ucwords($name);
       }else{
        return '';
       }
    }
    public function getInvoiceAttribute()
    {
        $t = $this->created_at->format('y-m-d H:i');
      return $t;
    }

    public function season()
    {
       return $this->belongsTo(Season::class , 'season_id' , 'id' );
    }


    public function user()
    {
       return $this->belongsTo(User::class , 'user_id' , 'id' );
    }



}
