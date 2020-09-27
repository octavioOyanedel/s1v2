<?php

namespace App;

use App\Cuota;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
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
