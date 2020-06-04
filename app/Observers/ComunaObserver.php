<?php

namespace App\Observers;

use App\Comuna;
use App\Traits\LogGenerico;

class ComunaObserver
{
    use LogGenerico;
    /**
     * Handle the comuna "created" event.
     *
     * @param  \App\Comuna  $comuna
     * @return void
     */
    public function created(Comuna $comuna)
    {
        $texto = obtenerTexto(array(), $comuna->toArray(), 'crear_comuna');  
        $this->logGenerico('Comuna creada: '.$texto);
    }

    /**
     * Handle the comuna "updated" event.
     *
     * @param  \App\Comuna  $comuna
     * @return void
     */
    public function updated(Comuna $comuna)
    {
        $texto = obtenerTexto($comuna->getOriginal(), $comuna->toArray(), '');
        $this->logGenerico('Datos de comuna editada: '.$texto);  
    }

    /**
     * Handle the comuna "deleted" event.
     *
     * @param  \App\Comuna  $comuna
     * @return void
     */
    public function deleted(Comuna $comuna)
    {
        $texto = obtenerTexto(array(), $comuna->toArray(), '');  
        $this->logGenerico('Comuna eliminada: '.$texto);
    }

    /**
     * Handle the comuna "restored" event.
     *
     * @param  \App\Comuna  $comuna
     * @return void
     */
    public function restored(Comuna $comuna)
    {
        //
    }

    /**
     * Handle the comuna "force deleted" event.
     *
     * @param  \App\Comuna  $comuna
     * @return void
     */
    public function forceDeleted(Comuna $comuna)
    {
        //
    }
}
