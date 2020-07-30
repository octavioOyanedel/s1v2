<?php

namespace App\Observers;

use App\Cuenta;
use App\Traits\LogGenerico;

class CuentaObserver
{
    use LogGenerico;
    /**
     * Handle the cuenta "created" event.
     *
     * @param  \App\Cuenta  $cuenta
     * @return void
     */
    public function created(Cuenta $cuenta)
    {
        $texto = obtenerTexto(array(), $cuenta->toArray(), 'crear');  
        $this->logGenerico('Cuenta bancaria agregada: '.$texto);
    }

    /**
     * Handle the cuenta "updated" event.
     *
     * @param  \App\Cuenta  $cuenta
     * @return void
     */
    public function updated(Cuenta $cuenta)
    {
        //
    }

    /**
     * Handle the cuenta "deleted" event.
     *
     * @param  \App\Cuenta  $cuenta
     * @return void
     */
    public function deleted(Cuenta $cuenta)
    {
        //
    }

    /**
     * Handle the cuenta "restored" event.
     *
     * @param  \App\Cuenta  $cuenta
     * @return void
     */
    public function restored(Cuenta $cuenta)
    {
        //
    }

    /**
     * Handle the cuenta "force deleted" event.
     *
     * @param  \App\Cuenta  $cuenta
     * @return void
     */
    public function forceDeleted(Cuenta $cuenta)
    {
        //
    }
}
