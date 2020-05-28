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

    public static function busquedaGeneral($nombre, $apellido, $q){
        $socios = Socio::orderBy('apellido1','ASC')
            ->nombres($nombre, $apellido)
            ->general($q, 'rut')
            ->general($q, 'nombre1')
            ->general($q, 'nombre2')
            ->general($q, 'apellido1')
            ->general($q, 'apellido2')
            ->general($q, 'genero')
            ->fecha($q, 'fecha_nac')
            ->general($q, 'celular')
            ->general($q, 'correo')
            ->union($q, 'urbes', 'urbes.id', 'socios.urbe_id', 'urbes.nombre')
            ->union($q, 'comunas', 'comunas.id', 'socios.comuna_id', 'comunas.nombre')
            ->general($q, 'direccion')
            ->fecha($q, 'fecha_pucv')
            ->union($q, 'sedes', 'sedes.id', 'socios.sede_id', 'sedes.nombre')
            ->union($q, 'areas', 'areas.id', 'socios.area_id', 'areas.nombre')
            ->union($q, 'cargos', 'cargos.id', 'socios.cargo_id', 'cargos.nombre')
            ->general($q, 'anexo')
            ->fecha($q, 'fecha_sind1')
            ->general($q, 'numero')
            ->union($q, 'ciudadanias', 'ciudadanias.id', 'socios.ciudadania_id', 'ciudadanias.nombre')
            ->get();
        return $socios;
    }

    public static function busquedaFiltroSocios(FiltroSocioRequest $request){
        $socios = Socio::orderBy('apellido1','ASC')
            ->rangoFecha($request->fecha_sind1_ini, $request->fecha_sind1_fin, 'fecha_sind1')
            ->generalAnd($request->categoria_id,'categoria_id')
            ->rangoFecha($request->fecha_nac_ini, $request->fecha_nac_fin, 'fecha_nac')
            ->generalAnd($request->genero,'genero')
            ->generalAnd($request->urbe_id,'urbe_id')
            ->generalAnd($request->comuna_id,'comuna_id')
            ->generalAnd($request->direccion,'direccion')
            ->generalAnd($request->ciudadania_id,'ciudadania_id')
            ->rangoFecha($request->fecha_pucv_ini, $request->fecha_pucv_fin, 'fecha_pucv')
            ->generalAnd($request->sede_id,'sede_id')
            ->generalAnd($request->area_id,'area_id')
            ->generalAnd($request->cargo_id,'cargo_id')
            ->get();
        return $socios;
    }
}