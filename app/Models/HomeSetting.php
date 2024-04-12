<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['logo'];

    public function getLogoAttribute() {

        if ($this->image !== null) {
            return public_path('/homeSetting/'.$this->image);
            //$image = env('APP_URL').'/homeSetting/'.$this->logo;
        } else {
            return url('/dist/images/dummy_image.webp');
        }
    }


}
