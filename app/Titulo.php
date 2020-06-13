<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'grado_id','establecimiento_id','nombre',
    ];  
}
