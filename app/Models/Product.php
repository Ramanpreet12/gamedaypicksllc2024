<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use App\Models\ProductSize;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];


    // get jersey images from products images  table
    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    public function product_variations(){
        return $this->hasMany(ProductVariation::class);
    }
}
