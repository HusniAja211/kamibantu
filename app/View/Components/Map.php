<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Map extends Component
{
    public string $type;

    public function __construct(string $type = 'default')
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('components.map');
    }
}
