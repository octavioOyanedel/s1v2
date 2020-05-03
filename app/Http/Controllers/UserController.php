<?php

namespace App\Http\Controllers;

use App\User;
use App\Privilegio;
use App\Traits\CrudGenerico;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\PasswordRequest;

class UserController extends Controller
{
    use CrudGenerico;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $privilegios = Privilegio::orderBy('nombre','ASC')->get();
        $usuario = User::findOrFail($id);
        $objetos = array('usuario'=>$usuario);
        $colecciones = array('privilegios'=>$privilegios);
        return view('app.usuarios.edit', compact('colecciones','objetos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $this->updateGenerico($request, User::findOrFail($id));
        return redirect('home')->with('status', 'Usuario Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the form for editing password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formEditarPassword()
    {
        return view('app.usuarios.pass');
    }

    /**
     * Update password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editarPassword(PasswordRequest $request)
    {
        $usuario = Auth::user();
        $usuario->password = Hash::make($request->nueva);
        $usuario->update();
        return redirect('home')->with('status', 'Contraseña Actualizada!');
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
    public function existeCorreo(Request $request)
    {
        if($request->ajax()){
            $usuarios = User::all();
            foreach ($usuarios as $usuario) {
                if($usuario->email === $request->parametro){
                    return response()->json('existe');
                }
            }
            return response()->json('error');
        }
    }

}
