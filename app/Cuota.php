<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'fecha','numero','monto','prestamo_id','estado_id',
    ];
}
