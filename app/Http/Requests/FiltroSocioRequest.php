<?php

namespace App\Http\Requests;

use App\Rules\DireccionRule;
use Illuminate\Foundation\Http\FormRequest;

class FiltroSocioRequest extends FormRequest
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
            'tipo_categoria' => 'required',
            'fecha_desv_ini' => 'nullable|date',
            'fecha_desv_fin' => 'nullable|date',
            'fecha_sind1_ini' => 'nullable|date',
            'fecha_sind1_fin' => 'nullable|date',
            'categoria_id' => 'nullable',
            'fecha_nac_ini' => 'nullable|date',
            'fecha_nac_fin' => 'nullable|date',
            'genero' => 'nullable',
            'urbe_id' => 'nullable',
            'comuna_id' => 'nullable',
            'direccion' => ['nullable', new DireccionRule],
            'ciudadania_id' => 'nullable',
            'fecha_pucv_ini' => 'nullable|date',
            'fecha_pucv_fin' => 'nullable|date',
            'sede_id' => 'nullable',
            'area_id' => 'nullable',
            'cargo_id' => 'nullable',
        ];
    }
}
