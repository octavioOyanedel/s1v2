<?php

namespace App\Observers;

use App\User;
use App\Traits\logGenerico;
use Illuminate\Support\Facades\Auth;

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
        //$texto = obtenerTexto(array(), $user->toArray(), 'crear_usuario');  
        //$this->logGenerico('Usuario creado: '.$texto);
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //cambio de contraseña
        if($user->password != $user->getOriginal('password')){
            $this->logGenerico('Cambio de contraseña.');
        }else{
            $texto = obtenerTexto($user->getOriginal(), $user->toArray(), 'editar_usuario');
            if($texto != ''){
                $this->logGenerico('Datos de usuario editado: '.$texto);
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
        $texto = obtenerTexto(array(), $user->toArray(), 'eliminar_usuario');  
        $this->logGenerico('Usuario eliminado: '.$texto, $user->id);
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
