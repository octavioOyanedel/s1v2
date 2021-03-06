<?php

namespace App\Http\Requests;

use App\Rules\NombreRule;
use Illuminate\Foundation\Http\FormRequest;

class EstablecimientoRequest extends FormRequest
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
        return [
            'nombre' => ['required', new NombreRule, 'unique:establecimientos,nombre'],
            'grado_id' => 'required',
        ];
    }
}
