<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GreekStore;

class GreekStoreVariation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function greek_store(){
        return $this->belongsTo(GreekStore::class);
    }

    public function productSize(){
        return $this->belongsTo(ProductSize::class   , 'size_id' , 'id');
    }

}
