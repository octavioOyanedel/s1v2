<?php

namespace App\Observers;

use App\Socio;
use App\Traits\logGenerico;

class SocioObserver
{
    use LogGenerico;
    /**
     * Handle the socio "created" event.
     *
     * @param  \App\Socio  $socio
     * @return void
     */
    public function created(Socio $socio)
    {
        $texto = obtenerTexto(array(), $socio->toArray(), 'crear_socio');  
        $this->logGenerico('Socio creado: '.$texto);
    }    

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(Socio $socio)
    {
        $texto = obtenerTexto($socio->getOriginal(), $socio->toArray(), 'editar_socio');
        $this->logGenerico('Datos de socio editado: '.$texto);           
    }    

    /**
     * Handle the socio "deleted" event.
     *
     * @param  \App\Socio  $socio
     * @return void
     */
    public function deleted(Socio $socio)
    {
        $texto = obtenerTexto(array(), $socio->toArray(), 'eliminar_socio');  
        $this->logGenerico('Socio eliminado: '.$texto);
    }    

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Socio  $socio
     * @return void
     */
    public function restored(Socio $socio)
    {
        dd($socio);
    }    
}
