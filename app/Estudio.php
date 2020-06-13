<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'socio_id','grado_id','establecimiento_id','fase_id','titulo_id',
    ];     
}
