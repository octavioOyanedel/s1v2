<?php

namespace App\Observers;

use App\Parentesco;
use App\Traits\LogGenerico;

class ParentescoObserver
{
    use LogGenerico;
    /**
     * Handle the parentesco "created" event.
     *
     * @param  \App\Parentesco  $parentesco
     * @return void
     */
    public function created(Parentesco $parentesco)
    {
        $texto = obtenerTexto(array(), $parentesco->toArray(), 'crear');  
        $this->logGenerico('Parentesco creado: '.$texto);
    }

    /**
     * Handle the parentesco "updated" event.
     *
     * @param  \App\Parentesco  $parentesco
     * @return void
     */
    public function updated(Parentesco $parentesco)
    {
        //$texto = obtenerTexto($parentesco->getOriginal(), $parentesco->toArray(), '');
        //$this->logGenerico('Datos de parentesco editado: '.$texto);  
    }

    /**
     * Handle the parentesco "deleted" event.
     *
     * @param  \App\Parentesco  $parentesco
     * @return void
     */
    public function deleted(Parentesco $parentesco)
    {
        //$texto = obtenerTexto(array(), $parentesco->toArray(), '');  
        //$this->logGenerico('Parentesco eliminado: '.$texto);
    }

    /**
     * Handle the parentesco "restored" event.
     *
     * @param  \App\Parentesco  $parentesco
     * @return void
     */
    public function restored(Parentesco $parentesco)
    {
        //
    }

    /**
     * Handle the parentesco "force deleted" event.
     *
     * @param  \App\Parentesco  $parentesco
     * @return void
     */
    public function forceDeleted(Parentesco $parentesco)
    {
        //
    }
}
