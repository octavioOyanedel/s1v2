<?php

namespace App\Observers;

use App\Fase;
use App\Traits\LogGenerico;

class FaseObserver
{
    use LogGenerico;
    /**
     * Handle the fase "created" event.
     *
     * @param  \App\Fase  $fase
     * @return void
     */
    public function created(Fase $fase)
    {
        $texto = obtenerTexto(array(), $fase->toArray(), 'crear');  
        $this->logGenerico('Estado estudio creado: '.$texto);
    }

    /**
     * Handle the fase "updated" event.
     *
     * @param  \App\Fase  $fase
     * @return void
     */
    public function updated(Fase $fase)
    {
        //
    }

    /**
     * Handle the fase "deleted" event.
     *
     * @param  \App\Fase  $fase
     * @return void
     */
    public function deleted(Fase $fase)
    {
        //
    }

    /**
     * Handle the fase "restored" event.
     *
     * @param  \App\Fase  $fase
     * @return void
     */
    public function restored(Fase $fase)
    {
        //
    }

    /**
     * Handle the fase "force deleted" event.
     *
     * @param  \App\Fase  $fase
     * @return void
     */
    public function forceDeleted(Fase $fase)
    {
        //
    }
}
