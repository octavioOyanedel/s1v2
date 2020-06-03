<?php

namespace App\Observers;

use App\Urbe;
use App\Traits\LogGenerico;

class UrbeObserver
{
	use LogGenerico;
    /**
     * Handle the urbe "created" event.
     *
     * @param  \App\Urbe  $urbe
     * @return void
     */
    public function created(Urbe $urbe)
    {
        //$texto = obtenerTexto(array(), $urbe->toArray(), '');  
        //$this->logGenerico('Ciudad creada: '.$texto);
    }

    /**
     * Handle the urbe "updated" event.
     *
     * @param  \App\Urbe  $urbe
     * @return void
     */
    public function updated(Urbe $urbe)
    {
        $texto = obtenerTexto($urbe->getOriginal(), $urbe->toArray(), '');
        $this->logGenerico('Datos de ciudad editada: '.$texto);   
    }

    /**
     * Handle the urbe "deleted" event.
     *
     * @param  \App\Urbe  $urbe
     * @return void
     */
    public function deleted(Urbe $urbe)
    {
        $texto = obtenerTexto(array(), $urbe->toArray(), '');  
        $this->logGenerico('Ciudad eliminada: '.$texto);
    }          
}
