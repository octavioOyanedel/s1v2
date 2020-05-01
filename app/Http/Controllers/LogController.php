<?php

namespace App\Http\Controllers;

use App\Log;
use App\User;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Traits\BuscarGenerico;

class LogController extends Controller
{
    use CrudGenerico;
    use BuscarGenerico;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }

    /************************************************
     ********************* AJAX ********************* 
     ************************************************/

    /**
     * Validar que exista correo para almacenar registro en log.
     *
     * @param  Request $request
     * @return boolean
     */
    public function registrarEnvioReset(Request $request)
    {
        $correo = $request->parametro;
        if($request->ajax()){
            $usuario = $this->buscarObjetoGenerico(new User, 'email', $correo);  
            $request->request->add(['operacion' => 'Envío de correo para recuperar contraseña.']); 
            $request->request->add(['ip' => obtenerIp()]);
            $request->request->add(['navegador' => obtenerBrowser()]);
            $request->request->add(['sistema' => obtenerSistemaOperativo()]);
            $request->request->add(['user_id' => $usuario->id]);
            $this->createGenerico($request, new Log);
            return response()->json('ok'); 
        }
        return response()->json('error');
    }    
}