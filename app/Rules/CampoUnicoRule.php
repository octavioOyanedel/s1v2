<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CampoUnicoRule implements Rule
{
    public $id;
    public $objeto;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id, $objeto)
    {
        $this->id = $id;
        $this->objeto = $objeto;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //$attribute = nombre de atributo
        //$value = valor actual recibido para el atributo en cuestión
        //$id = id de objeto donde se encuentra parametro a evaluar
        //$objeto = objeto inyectado para busqueda en base de datos
        $objeto = $this->objeto->findOrFail($this->id);
        if($value != $objeto[$attribute]){ //valor actual distinto a valor almacenado en mase de datos
            return $objeto::esUnico($value, $attribute); //crear metodo esunico en cada modelo que se invoque
        }else{
            return true;
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El valor de este campo ya esta registrado.';
    }
}
