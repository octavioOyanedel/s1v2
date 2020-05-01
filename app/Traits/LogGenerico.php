<?php
 
namespace App\Traits;
 
use App\Log;
use App\User;
use Exception;
use Illuminate\Http\Request;
 
trait LogGenerico {
 
    public static function logGenerico($operacion, User $usuario)
    {
        $log = new Log;
        $log->operacion = $operacion;
        $log->ip = obtenerIp();
        $log->navegador = obtenerBrowser();
        $log->sistema = obtenerSistemaOperativo();
        $log->user_id = $usuario->id;
        $log->save();
    }

}