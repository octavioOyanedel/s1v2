<?php

namespace App\Rules;

use App\Prestamo;
use Illuminate\Contracts\Validation\Rule;

class AbonoRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
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
        $monto_prestamo = Prestamo::findOrFail($this->id)->monto;
        $suma_abonos = sumarAbonos($this->id);
        if( ($value + $suma_abonos) > $monto_prestamo){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Monto abonado supera al monto total adeudado.';
    }
}
