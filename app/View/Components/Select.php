<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $label;
    public $nombre;
    public $id;
    public $tamano;
    public $obligatorio;
    public $colecciones;
    public $keyColeccion;
    public $objetos;
    public $keyObjeto;    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $nombre, $id, $tamano, $obligatorio, $colecciones, $keyColeccion, $objetos, $keyObjeto)
    {
        $this->label = $label;
        $this->nombre = $nombre;
        $this->id = $id;
        $this->tamano = $tamano;
        $this->obligatorio = $obligatorio;
        $this->colecciones = $colecciones;
        $this->keyColeccion = $keyColeccion;
        $this->objetos = $objetos;
        $this->keyObjeto = $keyObjeto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
