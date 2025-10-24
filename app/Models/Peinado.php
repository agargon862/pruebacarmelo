<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peinado extends Model
{
    //

    protected $table = 'peinados';
    protected $fillable = ['name', 'author', 'hair_type', 'description', 'price', 'photo'];
}
