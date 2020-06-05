<?php

namespace App;

use App\Socio;
use App\Parentesco;
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

    /*******************************************************************************************
    /************************************ Relaciones *******************************************
    *******************************************************************************************/
    
    /**
     * Relación belongsTo
     * Esta/e parentesco pertenece a un/a carga
     */
    public function parentesco()
    {
        return $this->belongsTo('App\Parentesco');
    }    

    /**
     * Relación belongsTo
     * Esta/e socio pertenece a un/a carga
     */
    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }      

    /*******************************************************************************************
    /************************************ Métodos Estáticos ************************************
    /*******************************************************************************************

    /**
     * Descripción: Comprobar que campo sea único y no exita repetido en tabla
     * Entrada/s: valor del campo
     * Salida: boolean
     */
    static public function esUnico($valor, $atributo)
    {
        $campos = Carga::pluck($atributo)->all();
        foreach ($campos as $campo) {
            if($campo === $valor){
                // falso ya que no es único
                return false;
            }
        }
        //verdadero ya que si es un valor único
        return true;
    }    

    /*******************************************************************************************
    /******************************* Consultas búsqueda general ********************************
    /*******************************************************************************************

    /**
     * scope busqueda nombres
     */
    public function scopeNombres($query, $nombre, $apellido)
    {
        if ($nombre && $apellido) {
            return $query->where('nombre1', '=', $nombre)->where('apellido1', '=', $apellido);
        }
    }   

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
}
