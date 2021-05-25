<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

use AngryMoustache\Rambo\Facades\Rambo;

class LinkPicker extends LivewireField
{
    public function render()
    {
        $routes = Rambo::getRoutes();

        return view('rambo::livewire.fields.link-picker', [
            'routes' => $routes,
        ]);
    }
}
