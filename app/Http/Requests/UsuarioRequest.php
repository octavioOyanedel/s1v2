<?php

namespace App\Http\Requests;

use App\User;
use App\Rules\NombreRule;
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
                'nombre1' => ['required', new NombreRule],
                'nombre2' => ['nullable', new NombreRule],
                'apellido1' => ['required', new NombreRule],
                'apellido2' => ['nullable', new NombreRule],
                'email' => 'required|email|unique:users,email',
                'password' => ['required','alpha_num','confirmed','min:8'],               
                'privilegio_id' => 'required',
            ];
        }else{
            return [
                'nombre1' => ['required', new NombreRule],
                'nombre2' => ['nullable', new NombreRule],
                'apellido1' => ['required', new NombreRule],
                'apellido2' => ['nullable', new NombreRule],
                'email' => ['required','email', new CampoUnicoRule(obtenerIdDesdeRequestUri(Request()->requestUri), new User)],
                'privilegio_id' => 'required',
            ];            
        }
    }
}
