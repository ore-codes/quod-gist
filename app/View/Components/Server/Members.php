<?php

namespace App\View\Components\Server;

use App\Models\Server;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Members extends Component
{
    public $server;

    /**
     * Create a new component instance.
     *
     * @param Server $server
     */
    public function __construct(Server $server)
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
        return view('components.server.members');
    }
}
