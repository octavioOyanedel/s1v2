<?php

namespace App\Observers;

use App\Establecimiento;
use App\Traits\LogGenerico;

class EstablecimientoObserver
{
    use LogGenerico;
    /**
     * Handle the establecimiento "created" event.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return void
     */
    public function created(Establecimiento $establecimiento)
    {
        $texto = obtenerTexto(array(), $establecimiento->toArray(), 'crear');  
        $this->logGenerico('Institución creada: '.$texto);
    }

    /**
     * Handle the establecimiento "updated" event.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return void
     */
    public function updated(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Handle the establecimiento "deleted" event.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return void
     */
    public function deleted(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Handle the establecimiento "restored" event.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return void
     */
    public function restored(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Handle the establecimiento "force deleted" event.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return void
     */
    public function forceDeleted(Establecimiento $establecimiento)
    {
        //
    }
}
