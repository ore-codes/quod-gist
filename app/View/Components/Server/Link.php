<?php

namespace App\View\Components\Server;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{
    public $server;

    /**
     * Create a new component instance.
     *
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.server.link');
    }
}
