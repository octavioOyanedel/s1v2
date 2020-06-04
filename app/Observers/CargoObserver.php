<?php

namespace App\Observers;

use App\Cargo;
use App\Traits\LogGenerico;

class CargoObserver
{
    use LogGenerico;
    /**
     * Handle the cargo "created" event.
     *
     * @param  \App\Cargo  $cargo
     * @return void
     */
    public function created(Cargo $cargo)
    {
        $texto = obtenerTexto(array(), $cargo->toArray(), 'crear_cargo');  
        $this->logGenerico('Cargo creado: '.$texto);
    }

    /**
     * Handle the cargo "updated" event.
     *
     * @param  \App\Cargo  $cargo
     * @return void
     */
    public function updated(Cargo $cargo)
    {
        $texto = obtenerTexto($cargo->getOriginal(), $cargo->toArray(), '');
        $this->logGenerico('Datos de cargo editado: '.$texto);  
    }

    /**
     * Handle the cargo "deleted" event.
     *
     * @param  \App\Cargo  $cargo
     * @return void
     */
    public function deleted(Cargo $cargo)
    {
        $texto = obtenerTexto(array(), $cargo->toArray(), '');  
        $this->logGenerico('Cargo eliminado: '.$texto);
    }

    /**
     * Handle the cargo "restored" event.
     *
     * @param  \App\Cargo  $cargo
     * @return void
     */
    public function restored(Cargo $cargo)
    {
        //
    }

    /**
     * Handle the cargo "force deleted" event.
     *
     * @param  \App\Cargo  $cargo
     * @return void
     */
    public function forceDeleted(Cargo $cargo)
    {
        //
    }
}
