<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminJersey extends Model
{
    use HasFactory;
    protected $guarded = [];


    // get jersey images from admin jersey images table
    public function jersey_images(){
        return $this->hasMany(AdminJerseyImage::class);
    }

}
