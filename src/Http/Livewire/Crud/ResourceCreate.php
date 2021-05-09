<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

use AngryMoustache\Rambo\Facades\Rambo;
use Livewire\Component;

class ResourceCreate extends Component
{
    public $component = 'rambo::livewire.crud.resource-create';

    public $resourceName;

    public $rules;

    public $fields = [];

    protected $listeners = [
        'field:update' => 'updateField',
    ];

    public function mount($resource)
    {
        $this->resourceName = $resource->routebase;
        $this->rules = $resource->validationFieldStack();
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

    public function updateField($value, $fieldName)
    {
        $this->fields[$fieldName] = $value;
        $this->updated($fieldName);
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        $resource = $this->resource();

        if (method_exists($resource, 'sluggify')) {
            $this->fields = $resource->sluggify($this->fields);
        }

        $savedModel = $resource->model()::create($this->fields);
        return redirect($resource->show($savedModel->id));
    }
}
