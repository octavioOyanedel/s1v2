<?php

namespace App\Observers;

use App\Prestamo;
use App\Traits\LogGenerico;

class PrestamoObserver
{
    use LogGenerico;
    /**
     * Handle the prestamo "created" event.
     *
     * @param  \App\Prestamo  $prestamo
     * @return void
     */
    public function created(Prestamo $prestamo)
    {
        $texto = obtenerTexto(array(), $prestamo->toArray(), 'crear');  
        $this->logGenerico('Préstamo creado: '.$texto);
    }

    /**
     * Handle the prestamo "updated" event.
     *
     * @param  \App\Prestamo  $prestamo
     * @return void
     */
    public function updated(Prestamo $prestamo)
    {
        $texto = obtenerTexto($prestamo->getOriginal(), $prestamo->toArray(), 'editar_prestamo');
        $this->logGenerico('Datos de prestamo editados: '.$texto);   
    }

    /**
     * Handle the prestamo "deleted" event.
     *
     * @param  \App\Prestamo  $prestamo
     * @return void
     */
    public function deleted(Prestamo $prestamo)
    {
        $texto = obtenerTexto(array(), $prestamo->toArray(), 'eliminar_socio');  
        $this->logGenerico('Préstamo eliminado: '.$texto);
    }

    /**
     * Handle the prestamo "restored" event.
     *
     * @param  \App\Prestamo  $prestamo
     * @return void
     */
    public function restored(Prestamo $prestamo)
    {
        //
    }

    /**
     * Handle the prestamo "force deleted" event.
     *
     * @param  \App\Prestamo  $prestamo
     * @return void
     */
    public function forceDeleted(Prestamo $prestamo)
    {
        //
    }
}
