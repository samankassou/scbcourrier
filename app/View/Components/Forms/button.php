<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class button extends Component
{
    /**
     * The type of button.
     *
     * @var string
     */
    public $type;

    /**
     * The display text.
     *
     * @var string
     */
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null, $text)
    {
        $this->type = $type;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.button');
    }
}
