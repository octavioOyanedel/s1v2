<?php

namespace App;

use App\Area;
use App\Sede;
use App\Urbe;
use App\Cargo;
use App\Comuna;
use App\Categoria;
use App\Ciudadania;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use SoftDeletes;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'rut','nombre1','nombre2','apellido1','apellido2','genero','fecha_nac','celular','correo','comuna_id','urbe_id','direccion','ciudadania_id','fecha_pucv','sede_id','area_id','cargo_id','anexo','fecha_sind1','numero','categoria_id',
    ];     

    /*******************************************************************************************
    /************************************ Relaciones *******************************************
    *******************************************************************************************/
    
    /**
     * Relación belongsTo
     * Esta/e urbe pertenece a un/a socio
     */
    public function urbe()
    {
        return $this->belongsTo('App\Urbe');
    }

    /**
     * Relación belongsTo
     * Esta/e comuna pertenece a un/a socio
     */
    public function comuna()
    {
        return $this->belongsTo('App\Comuna');
    }    

    /**
     * Relación belongsTo
     * Esta/e sede pertenece a un/a socio
     */
    public function sede()
    {
        return $this->belongsTo('App\Sede');
    }

    /**
     * Relación belongsTo
     * Esta/e área pertenece a un/a socio
     */
    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    /**
     * Relación belongsTo
     * Esta/e cargo pertenece a un/a socio
     */
    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }

    /**
     * Relación belongsTo
     * Esta/e categoria pertenece a un/a socio
     */
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }    

    /**
     * Relación belongsTo
     * Esta/e ciudadania pertenece a un/a socio
     */
    public function ciudadania()
    {
        return $this->belongsTo('App\Ciudadania');
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
        $campos = Socio::pluck($atributo)->all();
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
     * scope busqueda nombre
     */
    public function scopeNombre1($query, $q)
    {
        if ($q) {
            return $query->orWhere('nombre1', '=', $q);
        }
    }

    /**
     * scope busqueda nombre2
     */
    public function scopeNombre2($query, $q)
    {
        if ($q) {
            return $query->orWhere('nombre2', '=', $q);
        }
    }

    /**
     * scope busqueda apellido
     */
    public function scopeApellido1($query, $q)
    {
        if ($q) {
            return $query->orWhere('apellido1', '=', $q);
        }
    }

    /**
     * scope busqueda apellido2
     */
    public function scopeApellido2($query, $q)
    {
        if ($q) {
            return $query->orWhere('apellido2', '=', $q);
        }
    }

    /**
     * scope busqueda rut
     */
    public function scopeRut($query, $q)
    {
        if ($q) {
            return $query->orWhere('rut', '=', $q);
        }
    }

    /**
     * scope busqueda género
     */
    public function scopeGenero($query, $q)
    {
        if ($q) {
            return $query->orWhere('genero', '=', $q);
        }
    }  

    /**
     * scope busqueda fecha nacimiento
     */
    public function scopeFechaNac($query, $q)
    {
        if ($q && esFormatoFecha($q)) {
            return $query->orWhere('fecha_nac', '=', formatoFecha($q));
        }
    }

    /**
     * scope busqueda celular
     */
    public function scopeCelular($query, $q)
    {
        if ($q) {
            return $query->orWhere('celular','LIKE',"%$q%");
        }
    } 

    /**
     * scope busqueda correo
     */
    public function scopeCorreo($query, $q)
    {
        if ($q) {
            return $query->orWhere('correo','LIKE',"%$q%");
        }
    }

    /**
     * scope busqueda urbe
     */
    public function scopeUrbe($query, $q)
    {
        if ($q) {
            return $query->join('urbes','socios.urbe_id','=','urbes.id')->orWhere('urbes.nombre','LIKE',"%$q%");
        }
    }     

    /**
     * scope busqueda comuna
     */
    public function scopeComuna($query, $q)
    {
        if ($q) {
            return $query->join('comunas','socios.comuna_id','=','comunas.id')->orWhere('comunas.nombre','LIKE',"%$q%");
        }
    }    

    /**
     * scope busqueda dirección
     */
    public function scopeDireccion($query, $q)
    {
        if ($q) {
            return $query->orWhere('direccion','LIKE',"%$q%");
        }
    }

    /**
     * scope busqueda fecha pucv
     */
    public function scopeFechaPucv($query, $q)
    {
        if ($q && esFormatoFecha($q)) {
            return $query->orWhere('fecha_pucv', '=', formatoFecha($q));
        }
    }

    /**
     * scope busqueda sede
     */
    public function scopeSede($query, $q)
    {
        if ($q) {
            return $query->join('sedes','socios.sede_id','=','sedes.id')->orWhere('sedes.nombre','LIKE',"%$q%");
        }
    } 

    /**
     * scope busqueda area
     */
    public function scopeArea($query, $q)
    {
        if ($q) {
            return $query->join('areas','socios.area_id','=','areas.id')->orWhere('areas.nombre','LIKE',"%$q%");
        }
    }

    /**
     * scope busqueda cargo
     */
    public function scopeCargo($query, $q)
    {
        if ($q) {
            return $query->join('cargos','socios.cargo_id','=','cargos.id')->orWhere('cargos.nombre','LIKE',"%$q%");
        }
    } 

    /**
     * scope busqueda anexo
     */
    public function scopeAnexo($query, $q)
    {
        if ($q) {
            return $query->orWhere('anexo','LIKE',"%$q%");
        }
    }

    /**
     * scope busqueda fecha sind1
     */
    public function scopeFechaSind1($query, $q)
    {
        if ($q && esFormatoFecha($q)) {
            return $query->orWhere('fecha_sind1', '=', formatoFecha($q));
        }
    } 

    /**
     * scope busqueda numero socio
     */
    public function scopeNumero($query, $q)
    {
        if ($q) {
            return $query->orWhere('numero','LIKE',"%$q%");
        }
    }

    /**
     * scope busqueda nacionalidad
     */
    public function scopeCiudadania($query, $q)
    {
        if ($q) {
            return $query->join('ciudadanias','socios.ciudadania_id','=','ciudadanias.id')->orWhere('ciudadanias.nombre','LIKE',"%$q%");
        }
    }                        
}
