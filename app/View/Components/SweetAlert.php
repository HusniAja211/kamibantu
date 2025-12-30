<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SweetAlert extends Component
{
    /**
     * Create a new component instance.
     */
    public string $type;
    
    public function __construct(string $type = 'default')
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sweet-alert');
    }
}
