<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

use AngryMoustache\Rambo\Facades\Rambo;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTable extends Component
{
    use WithPagination;

    public $resourceName;

    public function mount($resource)
    {
        $this->resourceName = $resource->routebase;
    }

    public function render()
    {
        $resource = $this->resource();

        $items = $resource->indexQuery()->paginate($resource->paginate ?? 10);

        return view('rambo::livewire.crud.index-table', [
            'resource' => $resource,
            'items' => $items,
        ]);
    }

    public function resource()
    {
        return Rambo::resource($this->resourceName);
    }
}
