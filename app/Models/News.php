<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['news' , 'videos'];

    public function getNewsAttribute() {

        if (($this->image !== null) && ($this->type == 'news'))  {

            return url('/storage/images/news/'.$this->image);

        } else {
            return url('/dist/images/dummy_image.webp');
        }

    }

    public function getVideosAttribute() {
        if (($this->image !== null) && ($this->type == 'video')) {
            // return "hello";
            return url('/storage/videos/'.$this->image);
        } else {
            return url('/dist/images/dummy_image.webp');
        }
    }

}
