<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ConfirmarPasswordRule implements Rule
{
    public $confirmar;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($confirmar)
    {
        $this->confirmar = $confirmar;
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
        if($this->confirmar === $value){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La nueva contraseña y su confirmación no coinciden.';
    }
}
