<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RangoFecha extends Component
{
    public $label;
    public $inicio;
    public $fin;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $inicio, $fin)
    {
        $this->label = $label;
        $this->inicio = $inicio;
        $this->fin = $fin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.rango-fecha');
    }
}
