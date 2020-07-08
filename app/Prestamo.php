<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'fecha','numero','cuenta_id','cheque','monto','cuotas','metodo_id','renta_id','estado_id','fecha_pago','socio_id',
    ];
}
