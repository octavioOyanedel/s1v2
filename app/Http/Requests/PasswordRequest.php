<?php

namespace App\Http\Requests;

use App\Rules\CompararPasswordRule;
use App\Rules\ConfirmarPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'actual' => ['required','alpha_num','min:8', new CompararPasswordRule],
            'nueva' => ['required','alpha_num','min:8', new ConfirmarPasswordRule($this->confirmar)],
            'confirmar' => 'required|alpha_num|min:8',
        ];
    }
}
