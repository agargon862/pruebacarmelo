<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peinado extends Model
{
    protected $table = 'peinados';
    protected $fillable = ['name', 'author', 'hair_type', 'description', 'price', 'photo'];

    public function getPath()
    {
        if($this->photo == null){
            return url('assets/img/corte.jpg');
        } else {
            return url('storage/' . $this->photo);
        }
    }
}