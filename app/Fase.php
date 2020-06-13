<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'nombre',
    ];  
}
