<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

use AngryMoustache\Rambo\Facades\Rambo;
use Livewire\Component;

class ResourceItem extends Component
{
    public $component;
    public $resourceName;
    public $item;

    public function mount($resource, $item)
    {
        $this->resourceName = $resource->routebase;
        $this->item = $item;
    }

    public function render()
    {
        $resource = $this->resource();

        return view($this->component, [
            'resource' => $resource,
        ]);
    }

    public function resource()
    {
        return Rambo::resource($this->resourceName);
    }
}
