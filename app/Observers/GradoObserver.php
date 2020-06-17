<?php

namespace App\Observers;

use App\Grado;
use App\Traits\LogGenerico;

class GradoObserver
{
    use LogGenerico;
    /**
     * Handle the grado "created" event.
     *
     * @param  \App\Grado  $grado
     * @return void
     */
    public function created(Grado $grado)
    {
        $texto = obtenerTexto(array(), $grado->toArray(), 'crear');  
        $this->logGenerico('Nivel académico creado: '.$texto);
    }

    /**
     * Handle the grado "updated" event.
     *
     * @param  \App\Grado  $grado
     * @return void
     */
    public function updated(Grado $grado)
    {
        //
    }

    /**
     * Handle the grado "deleted" event.
     *
     * @param  \App\Grado  $grado
     * @return void
     */
    public function deleted(Grado $grado)
    {
        //
    }

    /**
     * Handle the grado "restored" event.
     *
     * @param  \App\Grado  $grado
     * @return void
     */
    public function restored(Grado $grado)
    {
        //
    }

    /**
     * Handle the grado "force deleted" event.
     *
     * @param  \App\Grado  $grado
     * @return void
     */
    public function forceDeleted(Grado $grado)
    {
        //
    }
}
