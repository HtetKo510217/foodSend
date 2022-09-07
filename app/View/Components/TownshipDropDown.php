<?php

namespace App\View\Components;

use App\Models\Township;
use Illuminate\View\Component;

class TownshipDropDown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.township-drop-down',[
            'townships' => Township::all(),
        ]);
    }
}
