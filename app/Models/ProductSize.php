<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariation;
use App\Models\GreekStoreVariation;

class ProductSize extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function productVariation(){
        return $this->hasOne(ProductVariation::class ,  'size_id' , 'id');
    }

    public function greek_store_variation(){
        return $this->hasOne(GreekStoreVariation::class ,  'size_id' , 'id');
    }

}
