<?php

namespace App\Observers;

use App\Renta;
use App\Traits\LogGenerico;

class RentaObserver
{
    use LogGenerico;
    /**
     * Handle the renta "created" event.
     *
     * @param  \App\Renta  $renta
     * @return void
     */
    public function created(Renta $renta)
    {
        $texto = obtenerTexto(array(), $renta->toArray(), 'crear');  
        $this->logGenerico('Interés agregado: '.$texto);
    }

    /**
     * Handle the renta "updated" event.
     *
     * @param  \App\Renta  $renta
     * @return void
     */
    public function updated(Renta $renta)
    {
        //
    }

    /**
     * Handle the renta "deleted" event.
     *
     * @param  \App\Renta  $renta
     * @return void
     */
    public function deleted(Renta $renta)
    {
        //
    }

    /**
     * Handle the renta "restored" event.
     *
     * @param  \App\Renta  $renta
     * @return void
     */
    public function restored(Renta $renta)
    {
        //
    }

    /**
     * Handle the renta "force deleted" event.
     *
     * @param  \App\Renta  $renta
     * @return void
     */
    public function forceDeleted(Renta $renta)
    {
        //
    }
}
