<?php

namespace App\Observers;

use App\Ciudadania;
use App\Traits\LogGenerico;

class CiudadaniaObserver
{
    use LogGenerico;
    /**
     * Handle the ciudadania "created" event.
     *
     * @param  \App\Ciudadania  $ciudadania
     * @return void
     */
    public function created(Ciudadania $ciudadania)
    {
        $texto = obtenerTexto(array(), $ciudadania->toArray(), 'crear');  
        $this->logGenerico('Nacionalidad creada: '.$texto);
    }

    /**
     * Handle the ciudadania "updated" event.
     *
     * @param  \App\Ciudadania  $ciudadania
     * @return void
     */
    public function updated(Ciudadania $ciudadania)
    {
        $texto = obtenerTexto($ciudadania->getOriginal(), $ciudadania->toArray(), '');
        $this->logGenerico('Datos de Nacionalidad editada: '.$texto); 
    }

    /**
     * Handle the ciudadania "deleted" event.
     *
     * @param  \App\Ciudadania  $ciudadania
     * @return void
     */
    public function deleted(Ciudadania $ciudadania)
    {
        $texto = obtenerTexto(array(), $ciudadania->toArray(), '');  
        $this->logGenerico('Nacionalidad eliminada: '.$texto);
    }

    /**
     * Handle the ciudadania "restored" event.
     *
     * @param  \App\Ciudadania  $ciudadania
     * @return void
     */
    public function restored(Ciudadania $ciudadania)
    {
        //
    }

    /**
     * Handle the ciudadania "force deleted" event.
     *
     * @param  \App\Ciudadania  $ciudadania
     * @return void
     */
    public function forceDeleted(Ciudadania $ciudadania)
    {
        //
    }
}
