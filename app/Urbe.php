<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urbe extends Model
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
