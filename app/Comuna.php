<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'urbe_id',
    ];
}
