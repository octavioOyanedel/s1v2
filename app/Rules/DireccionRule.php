<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DireccionRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚñÑ 0-9 \*\#\-\_\.\,\°\'\"]*$/",$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Solo se permiten letras, números, comillas dobles y simples más los sig. caracteres * # - _ . , °';
    }
}