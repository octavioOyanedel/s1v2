<?php

namespace App\Http\Requests;

use App\Carga;
use App\Rules\NombreRule;
use App\Rules\CampoUnicoRule;
use App\Rules\ValidarRutRule;
use Illuminate\Foundation\Http\FormRequest;

class CargaRequest extends FormRequest
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
                'rut' => ['required','alpha_num','unique:cargas,rut','max:9', new ValidarRutRule],
                'nombre1' => ['required', new NombreRule],
                'nombre2' => ['nullable', new NombreRule],
                'apellido1' => ['required', new NombreRule],
                'apellido2' => ['nullable', new NombreRule],
                'fecha_nac' => 'nullable|date',
                'socio_id' => 'required',
                'parentesco_id' => 'required',
            ];
        }else{
            return [
                'rut' => ['required','alpha_num', 'max:9', new ValidarRutRule, new CampoUnicoRule(obtenerIdDesdeRequestUri(Request()->requestUri), new Carga)],
                'nombre1' => ['required', new NombreRule],
                'nombre2' => ['nullable', new NombreRule],
                'apellido1' => ['required', new NombreRule],
                'apellido2' => ['nullable', new NombreRule],
                'fecha_nac' => 'nullable|date',
                'socio_id' => 'required',
                'parentesco_id' => 'required',
            ];            
        }
    }
}
