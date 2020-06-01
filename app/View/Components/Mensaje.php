<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Mensaje extends Component
{
    public $alerta;
    public $alinear;
    public $icono;
    public $mensaje;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($alerta, $alinear, $icono, $mensaje)
    {
        $this->alerta = $alerta;
        $this->alinear = $alinear;
        $this->icono = $icono;
        $this->mensaje = $mensaje;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.msg.mensaje');
    }
}
