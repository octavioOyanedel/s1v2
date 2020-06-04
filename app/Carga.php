<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rut', 'nombre1', 'nombre2', 'apellido1', 'apellido2', 'fecha_nac', 'socio_id', 'parentesco_id',
    ];
}
