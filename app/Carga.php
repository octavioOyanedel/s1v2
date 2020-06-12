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
        'id','rut', 'nombre1', 'nombre2', 'apellido1', 'apellido2', 'fecha_nac', 'socio_id', 'parentesco_id',
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

    /**
     * scope busqueda fecha 
     */
    public function scopeRangoFecha($query, $inicio, $fin, $campo)
    {
        if($inicio != null && $fin != null){
            return $query->whereBetween($campo, [formatoFecha($inicio),formatoFecha($fin)]);
        }
        if($inicio != null && $fin === null){
            return $query->where($campo,'>=',$inicio);
        }
        if($inicio === null && $fin != null){
            return $query->where($campo,'<=',$fin);
        }
    }   
    
    /**
     * scope busqueda general
     */
    public function scopeGeneralAnd($query, $q, $campo)
    {
        //lista de parenescos adicionales
        // -1 hijos (1,2)
        // -2 padres (3,4)
        // -3 abuelos (4,6)
        if($q){
            switch ($q) {
                case '-1':
                    return $query->where('parentesco_id','1')->orWhere('parentesco_id','2');
                    break;
                 case '-2':
                    return $query->where('parentesco_id','3')->orWhere('parentesco_id','4');;
                    break;     
                 case '-3':
                    return $query->where('parentesco_id','5')->orWhere('parentesco_id','6');;
                    break;       
                default:
                    return $query->where($campo,'LIKE',"%$q%");
                    break;
            }           
        }

    }        

    /**
     * scope busqueda rango edades
     */
    public function scopeRangoEdades($query, $edad_ini, $edad_fin)
    {
        if($edad_ini != null && $edad_fin != null){
            // si son alcanzan el año edad_ini = 0 y edad_fin = 0
            if((int)$edad_ini < 1 && (int)$edad_fin < 1){
                return $query->whereBetween('fecha_nac', [date('Y').'-01'.'-01',date('Y-m-d')]);
            }
            // si se busca desde los que no alcanzan el año edad_ini = 0 y edad_fin > 0
            if((int)$edad_ini < 1 && (int)$edad_fin > 0){
                return $query->whereBetween('fecha_nac', [fechaRangoEdad($edad_fin),date('Y-m-d')]);
            }
            // si se busca entre rango de edad con años cumplidos edad_ini > 0 y edad_fin > 0
            if((int)$edad_ini > 0 && (int)$edad_fin > 0 && (int)$edad_ini != (int)$edad_fin){
                return $query->whereBetween('fecha_nac', [fechaRangoEdad($edad_fin),fechaRangoEdad($edad_ini)]);
            }
            // si se busca entre rango de edades iguales edad_ini === edad_fin
            if((int)$edad_ini === (int)$edad_fin){
                //dd('iguales');
                return $query->whereBetween('fecha_nac', [fechaRangoEdadIgualIni($edad_ini),fechaRangoEdad($edad_ini)]);
            }                       
        }
        if($edad_ini != null && $edad_fin === null){
            if((int)$edad_ini < 1){
                return $query->where('fecha_nac','>=',date('Y-m-d'));
            }else{
                return $query->where('fecha_nac','>=',fechaRangoEdad($edad_ini));
            }
        }
        if($edad_ini === null && $edad_fin != null){
            if((int)$edad_fin < 1){
                return $query->where('fecha_nac','>=',date('Y-m-d'));
            }else{
                return $query->where('fecha_nac','>=',fechaRangoEdad($edad_fin));
            }
        }       
    }      
}
