<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GreekStoreImage;
use App\Models\GreekStoreVariation;

class GreekStore extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function greek_store_image(){
        return $this->hasMany(GreekStoreImage::class);
    }
    public function greek_store_variations(){
        return $this->hasMany(GreekStoreVariation::class);
    }


}
