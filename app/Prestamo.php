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

    /*******************************************************************************************
    /******************************* Consultas búsqueda general ********************************
    /*******************************************************************************************

    /**
     * scope busqueda fecha 
     */
    public function scopeFecha($query, $q, $campo)
    {
        if ($q && esFormatoFecha($q)) {
            return $query->orWhere($campo, '=', formatoFecha($q));
        }
    }

    /**
     * scope busqueda general
     */
    public function scopeGeneral($query, $q, $campo)
    {
        if ($q) {
            return $query->orWhere($campo, 'LIKE', "%$q%");
        }
    }

    /**
     * scope busqueda unión (join)
     */
    public function scopeUnion($query, $q, $tabla2, $tabla2_id, $tabla1_id, $tabla2_campo)
    {
        if ($q) {
            return $query->join($tabla2,$tabla1_id,'=',$tabla2_id)->orWhere($tabla2_campo,'LIKE',"%$q%");
        }
    }       

}
