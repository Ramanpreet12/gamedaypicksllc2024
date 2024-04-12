<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;
use Auth;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    // get order with order items

    // public function get_orders(){
    //     return $this->belongsTo(Order::class , 'order_id');
    // }

    // get products

    // public function get_products(){
    //     return $this->belongsTo(Product::class , 'product_id');
    // }


}

