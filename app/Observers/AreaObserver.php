<?php

namespace App\Observers;

use App\Area;
use App\Traits\LogGenerico;

class AreaObserver
{
    use LogGenerico;
    /**
     * Handle the area "created" event.
     *
     * @param  \App\Area  $area
     * @return void
     */
    public function created(Area $area)
    {
        $texto = obtenerTexto(array(), $area->toArray(), '');  
        $this->logGenerico('Área creada: '.$texto);
    }

    /**
     * Handle the area "updated" event.
     *
     * @param  \App\Area  $area
     * @return void
     */
    public function updated(Area $area)
    {
        $texto = obtenerTexto($area->getOriginal(), $area->toArray(), '');
        $this->logGenerico('Datos de área editada: '.$texto);  
    }

    /**
     * Handle the area "deleted" event.
     *
     * @param  \App\Area  $area
     * @return void
     */
    public function deleted(Area $area)
    {
        $texto = obtenerTexto(array(), $area->toArray(), '');  
        $this->logGenerico('Área eliminada: '.$texto);
    }

    /**
     * Handle the area "restored" event.
     *
     * @param  \App\Area  $area
     * @return void
     */
    public function restored(Area $area)
    {
        //
    }

    /**
     * Handle the area "force deleted" event.
     *
     * @param  \App\Area  $area
     * @return void
     */
    public function forceDeleted(Area $area)
    {
        //
    }
}
