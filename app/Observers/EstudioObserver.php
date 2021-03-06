<?php

namespace App\Observers;

use App\Estudio;
use App\Traits\LogGenerico;

class EstudioObserver
{
    use LogGenerico;
    /**
     * Handle the estudio "created" event.
     *
     * @param  \App\Estudio  $estudio
     * @return void
     */
    public function created(Estudio $estudio)
    {
        $texto = obtenerTexto(array(), $estudio->toArray(), 'crear');  
        $this->logGenerico('Estudio creado: '.$texto);
    }

    /**
     * Handle the estudio "updated" event.
     *
     * @param  \App\Estudio  $estudio
     * @return void
     */
    public function updated(Estudio $estudio)
    {
        $texto = obtenerTexto($estudio->getOriginal(), $estudio->toArray(), 'editar_carga');
        $this->logGenerico('Datos de estudio realizado editados: '.$texto); 
    }

    /**
     * Handle the estudio "deleted" event.
     *
     * @param  \App\Estudio  $estudio
     * @return void
     */
    public function deleted(Estudio $estudio)
    {
        $texto = obtenerTexto(array(), $estudio->toArray(), '');  
        $this->logGenerico('Estudio realizado eliminado: '.$texto);
    }

    /**
     * Handle the estudio "restored" event.
     *
     * @param  \App\Estudio  $estudio
     * @return void
     */
    public function restored(Estudio $estudio)
    {
        //
    }

    /**
     * Handle the estudio "force deleted" event.
     *
     * @param  \App\Estudio  $estudio
     * @return void
     */
    public function forceDeleted(Estudio $estudio)
    {
        //
    }
}
