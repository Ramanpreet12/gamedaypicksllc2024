<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CraftmanVisitor extends Model
{
    use HasFactory;
    protected $table = 'craftman_visitors';
    protected $fillable = [
        'ip_address'
    ];
}
