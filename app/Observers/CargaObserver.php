<?php

namespace App\Observers;

use App\Carga;
use App\Traits\LogGenerico;

class CargaObserver
{
    use LogGenerico;
    /**
     * Handle the carga "created" event.
     *
     * @param  \App\Carga  $carga
     * @return void
     */
    public function created(Carga $carga)
    {
        $texto = obtenerTexto(array(), $carga->toArray(), 'crear_carga');  
        $this->logGenerico('Carga familiar agregada: '.$texto);
    }

    /**
     * Handle the carga "updated" event.
     *
     * @param  \App\Carga  $carga
     * @return void
     */
    public function updated(Carga $carga)
    {
        $texto = obtenerTexto($carga->getOriginal(), $carga->toArray(), 'editar_carga');
        $this->logGenerico('Datos de carga familiar editada: '.$texto);   
    }

    /**
     * Handle the carga "deleted" event.
     *
     * @param  \App\Carga  $carga
     * @return void
     */
    public function deleted(Carga $carga)
    {
        $texto = obtenerTexto(array(), $carga->toArray(), 'eliminar_carga');  
        $this->logGenerico('Carga familiar eliminada: '.$texto);
    }

    /**
     * Handle the carga "restored" event.
     *
     * @param  \App\Carga  $carga
     * @return void
     */
    public function restored(Carga $carga)
    {
        //
    }

    /**
     * Handle the carga "force deleted" event.
     *
     * @param  \App\Carga  $carga
     * @return void
     */
    public function forceDeleted(Carga $carga)
    {
        //
    }
}
