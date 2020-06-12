<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiltroCargaRequest extends FormRequest
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
            'fecha_nac_ini' => 'nullable|date',
            'fecha_nac_fin' => 'nullable|date',
            'edad_ini' => 'nullable|lte:edad_fin',
            'edad_fin' => 'nullable',
            'parentesco_id' => 'nullable',
        ];
    }
}
