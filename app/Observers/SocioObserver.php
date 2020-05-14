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
}
