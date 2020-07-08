<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha','monto','prestamo_id',
    ];
}
