<?php

namespace App;

use App\Area;
use App\Sede;
use App\Cargo;
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

    /*******************************************************************************************
    /************************************ Métodos Estáticos ************************************
    *******************************************************************************************/


}
