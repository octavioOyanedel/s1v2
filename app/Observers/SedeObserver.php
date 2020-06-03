<?php

namespace App\Observers;

use App\Sede;
use App\Traits\LogGenerico;

class SedeObserver
{
    use LogGenerico;
    /**
     * Handle the sede "created" event.
     *
     * @param  \App\Sede  $sede
     * @return void
     */
    public function created(Sede $sede)
    {
        //$texto = obtenerTexto(array(), $sede->toArray(), '');  
        //$this->logGenerico('Sede creada: '.$texto);
    }

    /**
     * Handle the sede "updated" event.
     *
     * @param  \App\Sede  $sede
     * @return void
     */
    public function updated(Sede $sede)
    {
        $texto = obtenerTexto($sede->getOriginal(), $sede->toArray(), '');
        $this->logGenerico('Datos de sede editada: '.$texto);   
    }

    /**
     * Handle the sede "deleted" event.
     *
     * @param  \App\Sede  $sede
     * @return void
     */
    public function deleted(Sede $sede)
    {
        $texto = obtenerTexto(array(), $sede->toArray(), '');  
        $this->logGenerico('Sede eliminada: '.$texto);
    }

    /**
     * Handle the sede "restored" event.
     *
     * @param  \App\Sede  $sede
     * @return void
     */
    public function restored(Sede $sede)
    {
        //
    }

    /**
     * Handle the sede "force deleted" event.
     *
     * @param  \App\Sede  $sede
     * @return void
     */
    public function forceDeleted(Sede $sede)
    {
        //
    }
}
