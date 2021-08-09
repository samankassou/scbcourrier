<?php

namespace App\View\Components\Menu;

use Illuminate\View\Component;

class LinkItem extends Component
{
    /**
     * The route name.
     *
     * @var string
     */
    public $route;

    /**
     * The displayed text.
     *
     * @var string
     */
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $text)
    {
        $this->route = $route;
        $this->text  = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu.link-item');
    }
}
