<?php

namespace App\View\Components\Messages;

use Illuminate\View\Component;

class error extends Component
{
    /**
     * The name of input.
     *
     * @var string
     */
    public $for;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($for)
    {
        $this->for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.messages.error');
    }
}
