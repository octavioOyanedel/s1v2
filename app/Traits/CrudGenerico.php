<?php
 
namespace App\Traits;
 
use Exception;
use Illuminate\Http\Request;
 
trait CrudGenerico {
 
    public static function createGenerico(Request $request, Object $objeto)
    {
        $objeto->create($request->all());
    }
 
    public static function updateGenerico(Request $request, Object $objeto)
    {       
        $atributos = $request->except('_token','_method');
        $objeto->update($atributos);
    }
 
    public static function deleteGenerico(Object $objeto)
    {
        $objeto->destroy($objeto->id);
    }
}