<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class label extends Component
{
    /**
     * The name of input.
     *
     * @var string
     */
    public $for;

    /**
     * The display.
     *
     * @var string
     */
    public $message;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($for, $message)
    {
        $this->for = $for;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.label');
    }
}
