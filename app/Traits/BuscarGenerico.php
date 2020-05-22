<?php
 
namespace App\Traits;
 
use App\User;
use App\Socio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
 
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

    public static function busquedaModuloSocio($nombre, $apellido, $q){
        $socios = Socio::orderBy('apellido1','ASC')
            ->nombres($nombre, $apellido)
            ->rut($q)
            ->nombre1($q)
            ->nombre2($q)
            ->apellido1($q)
            ->apellido2($q)            
            ->genero($q)
            ->fechaNac($q)
            ->celular($q)
            ->correo($q)
            ->urbe($q)
            ->comuna($q)
            ->direccion($q)
            ->fechaPucv($q)
            ->sede($q)
            ->area($q)
            ->cargo($q)
            ->anexo($q)
            ->fechaSind1($q)
            ->numero($q)
            ->ciudadania($q)
            ->get();
        return $socios;
    }
}