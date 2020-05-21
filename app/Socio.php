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


}
