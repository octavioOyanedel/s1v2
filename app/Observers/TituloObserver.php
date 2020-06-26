<?php

namespace App\Observers;

use App\Titulo;
use App\Traits\LogGenerico;

class TituloObserver
{
    use LogGenerico;
    /**
     * Handle the titulo "created" event.
     *
     * @param  \App\Titulo  $titulo
     * @return void
     */
    public function created(Titulo $titulo)
    {
        $texto = obtenerTexto(array(), $titulo->toArray(), 'crear');  
        $this->logGenerico('Título creado: '.$texto);
    }

    /**
     * Handle the titulo "updated" event.
     *
     * @param  \App\Titulo  $titulo
     * @return void
     */
    public function updated(Titulo $titulo)
    {
        //
    }

    /**
     * Handle the titulo "deleted" event.
     *
     * @param  \App\Titulo  $titulo
     * @return void
     */
    public function deleted(Titulo $titulo)
    {
        //
    }

    /**
     * Handle the titulo "restored" event.
     *
     * @param  \App\Titulo  $titulo
     * @return void
     */
    public function restored(Titulo $titulo)
    {
        //
    }

    /**
     * Handle the titulo "force deleted" event.
     *
     * @param  \App\Titulo  $titulo
     * @return void
     */
    public function forceDeleted(Titulo $titulo)
    {
        //
    }
}
