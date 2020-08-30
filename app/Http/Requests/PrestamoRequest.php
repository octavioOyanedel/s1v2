<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestamoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(Request()->method === 'POST'){
            return [
                'socio_id' => 'required',
                'fecha' => 'required|date',
                'numero' => 'required|numeric|unique:prestamos,numero',
                'cuenta_id' => 'required',
                'cheque' => 'required|numeric',
                'renta_id' => 'required',
                'monto' => 'required|numeric',
                'metodo_id' => 'required',
                'cuotas' => 'nullable',
                'fecha_pago' => 'nullable|date',
            ];
        }else{
            return [

            ];            
        }
    }
}
