<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentForJersey;

class Jersey extends Model
{
    use HasFactory;
    protected $fillable= ['name' ,'user_id' , 'admin_jersey_id', 'jersey_number' ,'jersey_image' ,  'email' ,'zipcode' ,  'size' , 'gender' , 'coupon_code'];

    public function jersey_payment()
    {
       return $this->belongsTo(PaymentForJersey::class , 'pre_signups_id' , 'pre_signup_user_id' );
    }
}
