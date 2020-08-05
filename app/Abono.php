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

    /*******************************************************************************************
    /************************************ Métodos Estáticos ************************************
    /*******************************************************************************************

    /**
     * Descripción: Sumar abonos
     * Entrada/s: id de préstamo
     * Salida: int suma
     */
    static public function sumarAbonos($id)
    {
    	return Abono::where('prestamo_id',$id)->get()->sum('monto');
    }    
}
