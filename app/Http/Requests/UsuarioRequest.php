<?php

namespace App\Http\Requests;

use App\User;
use App\Rules\CampoUnicoRule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
                'nombre1' => 'required|alpha',
                'nombre2' => 'nullable|alpha',
                'apellido1' => 'required|alpha',
                'apellido2' => 'nullable|alpha',
                'email' => 'required|email:rfc,dns|unique:users,email',
                'password' => ['required','alpha_num','min:8'],
                'confirmar' => 'required|alpha_num|min:8',                
                'privilegio_id' => 'required',
            ];
        }else{
            return [
                'nombre1' => 'required|alpha',
                'nombre2' => 'nullable|alpha',
                'apellido1' => 'required|alpha',
                'apellido2' => 'nullable|alpha',
                'email' => ['required','email:rfc,dns', new CampoUnicoRule(obtenerIdDesdeRequestUri(Request()->requestUri), new User)],
                'privilegio_id' => 'required',
            ];            
        }
    }
}
