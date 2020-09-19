<?php

namespace App;

use App\Abono;
use App\Renta;
use App\Estado;
use Illuminate\Support\Facades\DB;
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

    /*******************************************************************************************
    /************************************ Relaciones *******************************************
    *******************************************************************************************/

    /**
     * Relación belongsTo
     * Esta/e estado de préstamo pertenece a un/a préstamo
     */
    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }    

    /**
     * Relación belongsTo
     * Esta/e cuenta bancaria pertenece a un/a préstamo
     */
    public function cuenta()
    {
        return $this->belongsTo('App\Cuenta');
    }    

    /**
     * Relación belongsTo
     * Esta/e método de pago pertenece a un/a préstamo
     */
    public function metodo()
    {
        return $this->belongsTo('App\Metodo');
    }      

    /**
     * Relación belongsTo
     * Esta/e socio de pago pertenece a un/a préstamo
     */
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }

    /**
     * Relación belongsTo
     * Esta/e renta (interés) pertenece a un/a préstamo
     */
    public function renta()
    {
        return $this->belongsTo('App\Renta');
    }      

    /**
     * Descripción: Eliminar préstamo
     * Entrada/s: prestamo de tipo Prestamo
     * Salida: void
     */
    static public function eliminarPrestamo(Prestamo $prestamo)
    {
        DB::table('prestamos')->where('id', $prestamo->id)->delete();
    }
}
