<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveJersey extends Model
{
    use HasFactory;
    protected $fillable=['user_id', 'admin_jersey_id','name' ,'jersey_name' , 'jersey_image'  , 'jersey_number','jersey_price' , 'age_group', 'size' , 'gender','zipcode', 'reserved_date'];
}
