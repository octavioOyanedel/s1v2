<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Filtro extends Component
{
    public $action;
    public $filtro;
    public $total;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $filtro, $total)
    {
        $this->action = $action;
        $this->filtro = $filtro;
        $this->total = $total;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.filtro.filtro');
    }
}
