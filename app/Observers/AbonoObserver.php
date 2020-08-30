<?php

namespace App\Observers;

use App\Abono;
use App\Traits\LogGenerico;

class AbonoObserver
{
    use LogGenerico;
    /**
     * Handle the abono "created" event.
     *
     * @param  \App\Abono  $abono
     * @return void
     */
    public function created(Abono $abono)
    {
        $texto = obtenerTexto(array(), $abono->toArray(), 'crear');  
        $this->logGenerico('Abono agregado: '.$texto);
    }

    /**
     * Handle the abono "updated" event.
     *
     * @param  \App\Abono  $abono
     * @return void
     */
    public function updated(Abono $abono)
    {
        //
    }

    /**
     * Handle the abono "deleted" event.
     *
     * @param  \App\Abono  $abono
     * @return void
     */
    public function deleted(Abono $abono)
    {
        //
    }

    /**
     * Handle the abono "restored" event.
     *
     * @param  \App\Abono  $abono
     * @return void
     */
    public function restored(Abono $abono)
    {
        //
    }

    /**
     * Handle the abono "force deleted" event.
     *
     * @param  \App\Abono  $abono
     * @return void
     */
    public function forceDeleted(Abono $abono)
    {
        //
    }
}
