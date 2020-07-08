<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'cantidad',
    ];
}
