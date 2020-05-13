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
        $texto = obtenerTexto($user->toArray(), array(), 'crear_usuario');  
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
        $texto = obtenerTexto($user->getOriginal(), $user->toArray(), 'editar_usuario');
        if($user->password != $user->getOriginal('password')){
            $this->logGenerico('Cambio de contraseña.');
        }else{
            if($texto != ''){
                $this->logGenerico('Datos de usuario editados: '.$texto);
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
        $texto = obtenerTexto($user->toArray(), array(), 'eliminar_usuario');  
        $this->logGenerico('Usuario eliminado: '.$texto);
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
