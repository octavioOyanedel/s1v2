<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'socio_id','grado_id','establecimiento_id','fase_id','titulo_id',
    ];     

    /*******************************************************************************************
    /************************************ Relaciones *******************************************
    *******************************************************************************************/
    
    /**
     * Relación belongsTo
     * Esta/e grado pertenece a un/a estudio
     */
    public function grado()
    {
        return $this->belongsTo('App\Grado');
    }

    /**
     * Relación belongsTo
     * Esta/e establecimiento pertenece a un/a estudio
     */
    public function establecimiento()
    {
        return $this->belongsTo('App\Establecimiento');
    }

    /**
     * Relación belongsTo
     * Esta/e fase pertenece a un/a estudio
     */
    public function fase()
    {
        return $this->belongsTo('App\Fase');
    }

    /**
     * Relación belongsTo
     * Esta/e titulo pertenece a un/a estudio
     */
    public function titulo()
    {
        return $this->belongsTo('App\Titulo');
    }            
}
