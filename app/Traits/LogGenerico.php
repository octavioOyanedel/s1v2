<?php
 
namespace App\Traits;
 
use App\Log;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
trait LogGenerico {
 
    public static function logGenerico($operacion, $id = null)
    {
        //dd($id.' - '.Auth::user()->id);
        $log = new Log;
        $log->operacion = $operacion;
        $log->ip = obtenerIp();
        $log->navegador = obtenerBrowser();
        $log->sistema = obtenerSistemaOperativo();
        $log->user_id = ($id === Auth::user()->id) ? null : Auth::user()->id;
        $log->save();
    }

}