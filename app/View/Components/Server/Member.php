<?php

namespace App\View\Components\Server;

use App\Models\User;
use Illuminate\View\Component;

class Member extends Component
{
    public $user;

    /**
     * Create a new component instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.server.member');
    }
}
