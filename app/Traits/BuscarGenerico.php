<?php
 
namespace App\Traits;
 
use Exception;
use Illuminate\Http\Request;
 
trait BuscarGenerico {
 
    public static function buscarObjetoGenerico(Object $objeto, string $campo, $valor)
    {
        return $objeto->where($campo,$valor)->first();
    }

    public static function buscarObjetosGenerico(Object $objeto, string $campo, $valor)
    {
        return $objeto->where($campo,$valor)->get();
    }
}