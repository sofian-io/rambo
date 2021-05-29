<?php

namespace AngryMoustache\Rambo\View\Components;

use Illuminate\View\Component;

class Toasts extends Component
{
    public $toasts;

    public function __construct()
    {
        $this->toasts = session()->pull('rambo-toasts') ?? [];
    }

    public function render()
    {
        return view('rambo::components.toasts', [
            'toasts' => $this->toasts,
        ]);
    }
}
