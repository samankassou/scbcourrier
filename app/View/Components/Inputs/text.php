<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class text extends Component
{
    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs.text');
    }
}
