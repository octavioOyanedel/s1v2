<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tabla extends Component
{
    public $coleccion;
    public $contenido;
    public $titulo;
    public $alinear;
    public $total;
    public $ver;
    public $editar;
    public $filtro;
    public $actionFiltro;
    public $tituloModal;
    public $actionModal;
    public $textoModal;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($coleccion, $contenido, $titulo, $alinear, $total, $ver, $editar, $filtro, $actionFiltro, $tituloModal, $actionModal, $textoModal)
    {
        $this->coleccion = $coleccion;
        $this->contenido = $contenido;
        $this->titulo = $titulo;
        $this->alinear = $alinear;
        $this->total = $total;
        $this->ver = $ver;
        $this->editar = $editar;
        $this->filtro = $filtro;
        $this->actionFiltro = $actionFiltro;
        $this->tituloModal = $tituloModal;
        $this->actionModal = $actionModal;
        $this->textoModal = $textoModal;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tabla.tabla');
    }
}
