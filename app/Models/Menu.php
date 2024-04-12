<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    protected $appends = ['parent'];

    public function getParentAttribute(){
        $name = \App\Models\Menu::where('id',$this->parent_id)->where('type','menu')->value('title');
    return  empty($name)?'n/a':ucfirst($name);
    }

    public function menu()
    {
       return $this->hasMany(Menu::class , 'parent_id' , 'id');
    }

}
