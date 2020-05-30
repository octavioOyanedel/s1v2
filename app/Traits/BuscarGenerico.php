<?php
 
namespace App\Traits;
 
use App\User;
use App\Socio;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\FiltroSocioRequest;
 
trait BuscarGenerico {
 
    public static function buscarObjetoGenerico(Object $objeto, string $campo, $valor)
    {
        return $objeto->where($campo,$valor)->first();
    }

    public static function buscarObjetosGenerico(Object $objeto, string $campo, $valor)
    {
        return $objeto->where($campo,$valor)->get();
    }

    public static function buscarParaFiltradoJoin($tabla_pk, $tabla_fk, $campo_pk, $cantidad, $columna, $orden)
    {
    	$modelo = obtenerObjetoModel($tabla_fk);
        return $modelo->join($tabla_pk, $tabla_pk.'.id', '=', $tabla_fk.'.'.$columna)
                ->orderBy($tabla_pk.'.'.$campo_pk,$orden)
                ->paginate($cantidad)->appends(obtenerAppendsArray($cantidad, $columna, $orden));
    }

    public static function buscarParaFiltrado($tabla_fk, $cantidad, $columna, $orden)
    {
    	$modelo = obtenerObjetoModel($tabla_fk);
        return $modelo->orderBy($columna, $orden)
            	->paginate($cantidad)->appends(obtenerAppendsArray($cantidad, $columna, $orden));
    }

}