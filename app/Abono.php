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
     * Salida: int suma de abonos.
     */
    static public function sumarAbonos($id)
    {
    	return Abono::where('prestamo_id',$id)->get()->sum('monto');
    }    

    /**
     * Descripción: Eliminar abonos
     * Entrada/s: prestamo de tipo Prestamo
     * Salida: void
     */
    static public function eliminarAbonosPrestamo(Prestamo $prestamo)
    {
        Abono::where('prestamo_id', $prestamo->id)->delete();
    }
}
