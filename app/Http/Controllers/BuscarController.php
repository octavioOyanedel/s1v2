<?php

namespace App\Http\Controllers;

use App\User;
use App\Carga;
use App\Socio;
use App\Prestamo;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BuscarController extends Controller
{
    /**
    * Buscar....
    *
    * @return \Illuminate\Http\Response
    */
    public function buscar(Request $request)
    {
        $nombre = '';
        $apellido = '';
        $q = $request->q;
        $coleccion = new Collection;
        $socios = null;

        $categorias = Categoria::orderBy('nombre','ASC')->get();
        $categorias->pull('0'); //quitar activo
        $anexos = array('categorias'=>$categorias);

        if($q != ''){
            $nombre = separarNombreApellido($q)['nombre'];
            if(count(separarNombreApellido($q)) > 1){
                $apellido = separarNombreApellido($q)['apellido'];
            }
            $socios = Socio::withTrashed()->orderBy('apellido1','ASC')
                ->nombres($nombre, $apellido)
                ->general($q, 'rut')
                ->general($q, 'nombre1')
                ->general($q, 'nombre2')
                ->general($q, 'apellido1')
                ->general($q, 'apellido2')
                ->general($q, 'direccion')
                ->fecha($q, 'fecha_nac')
                ->general($q, 'celular')
                ->general($q, 'correo')
                ->fecha($q, 'fecha_pucv')
                ->general($q, 'anexo')
                ->fecha($q, 'fecha_sind1')
                ->general($q, 'numero')          
                ->get();

            $usuarios = User::orderBy('apellido1','ASC')
                ->nombres($nombre, $apellido)
                ->general($q, 'nombre1')
                ->general($q, 'nombre2')
                ->general($q, 'apellido1')
                ->general($q, 'apellido2')
                ->general($q, 'email')         
                ->get();

            $cargas = Carga::orderBy('apellido1','ASC')
                ->nombres($nombre, $apellido)
                ->general($q, 'nombre1')
                ->general($q, 'nombre2')
                ->general($q, 'apellido1')
                ->general($q, 'apellido2')
                ->general($q, 'rut') 
                ->fecha($q, 'fecha_nac')        
                ->get();

            $prestamos = Prestamo::orderBy('prestamos.created_at','DESC')
                ->unionEstados($q)
                ->unionMetodos($q)
                ->unionSocios($q)
                ->general($q, 'cheque')
                ->general($q, 'monto')
                ->general($q, 'cuotas')
                ->fecha($q, 'fecha')
                ->fecha($q, 'fecha_pago')   
                ->get();             

            if($socios->count() > 0){
                $this->iterarColeccion($socios, $coleccion);
            }

            if($usuarios->count() > 0){
                $this->iterarColeccion($usuarios, $coleccion);
            }      

            if($cargas->count() > 0){
                $this->iterarColeccion($cargas, $coleccion);
            }     

            if($prestamos->count() > 0){
                $this->iterarColeccion($prestamos, $coleccion);
            }                      

            $total = count($coleccion);
            $coleccion->paginate(5);
            return view('app.buscar.index', compact('coleccion','q','total','anexos'));
        }else{
            return back();
        }
    } 

    public function iterarColeccion($coleccionModulo, &$coleccionFinal)
    {
    	foreach ($coleccionModulo as $item) {
    		$coleccionFinal->push($item);
    	}    	
    }  
}
