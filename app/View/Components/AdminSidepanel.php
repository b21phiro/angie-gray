<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AdminSidepanel extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public User $user
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-sidepanel');
    }
}
