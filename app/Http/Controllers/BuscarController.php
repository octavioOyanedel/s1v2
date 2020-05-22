<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\BuscarGenerico;
use Illuminate\Support\Collection;

class BuscarController extends Controller
{
	use BuscarGenerico;
    /**
     * Buscar.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request)
    {
    	$nombre = '';
    	$apellido = '';
    	$general = $request->q;
    	$coleccion = new Collection;
    	if($general != ''){
	    	$nombre = separarNombreApellido($request->q)['nombre'];
	    	if(count(separarNombreApellido($request->q)) > 1){
	    		$apellido = separarNombreApellido($request->q)['apellido'];
	    	}
	    	$socios = $this->busquedaModuloSocio($nombre, $apellido, $general);
	    	if($socios->count() > 0){
	    		$this->iterarColeccion($socios, $coleccion);
	    	}
  			$coleccion->paginate(2);
	    	return view('app.buscar.index', compact('coleccion'));
	    	//return view('app.buscar.index', compact('resultados'));
    	}else{
    		return back();
    	}



        //
    } 

    public function iterarColeccion($coleccionModulo, &$coleccionFinal){
    	foreach ($coleccionModulo as $item) {
    		$coleccionFinal->push($item);
    	}    	
    }  
}
