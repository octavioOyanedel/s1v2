<?php

namespace App\Observers;

use App\User;
use App\Traits\logGenerico;

class UserObserver
{
    use LogGenerico;
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $texto = obtenerDatosCreados(eliminarValoresArray($user->toArray(), 'crear_usuario'));  
        $this->logGenerico('Usuario creado: '.$texto, $user);
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $texto = obtenerDatosEditados($user->getOriginal(), $user->toArray(), 'editar_usuario');
        if($user->password != $user->getOriginal('password')){
            $this->logGenerico('Cambio de contraseña.', $user);
        }else{
            if($texto != ''){
                $this->logGenerico('Datos de usuario editados: '.$texto, $user);
            }            
        }
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $user->id = null;
        $texto = obtenerDatosCreados(eliminarValoresArray($user->toArray(), 'eliminar_usuario'));  
        $this->logGenerico('Usuario eliminado: '.$texto, $user);
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
