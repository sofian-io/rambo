<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use Livewire\Component;

class CrudTable extends Component
{
    public $resourceClass;
    public $checkboxes = [];

    public function mount($resource)
    {
        $this->resourceClass = get_class($resource);
    }

    public function handleAction($key)
    {
        $resource = $this->getResource();
        $resource->actions()[$key]->handle($this->getResource(), $this->getCheckboxes());
        $this->checkboxes = [];
    }

    public function render()
    {
        $resource = $this->getResource();

        $items = ($resource::getModel())::orderBy('id', 'desc')
            ->paginate($resource::$paginate ?? 10);

        $this->checkboxes = collect($this->checkboxes)->filter()->toArray();

        return view('rambo::livewire.crud-table', [
            'resource' => $resource,
            'actions' => $resource->actions(),
            'items' => $items,
        ]);
    }

    private function getResource()
    {
        return (new $this->resourceClass);
    }

    private function getCheckboxes()
    {
        return collect($this->checkboxes)->filter()->keys()->toArray();
    }
}
