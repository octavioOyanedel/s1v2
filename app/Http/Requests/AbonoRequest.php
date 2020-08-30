<?php

namespace App\Http\Requests;

use App\Rules\AbonoRule;
use Illuminate\Foundation\Http\FormRequest;

class AbonoRequest extends FormRequest
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
            'fecha' => 'required|date',
            'monto' => ['required','numeric', new AbonoRule(Request()->prestamo_id)],
            'prestamo_id' => 'required'
        ];
    }
}
