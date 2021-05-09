<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

class ResourceEdit extends ResourceCreate
{
    public $component = 'rambo::livewire.crud.resource-edit';
    public $item;

    public function mount($resource, $item = null)
    {
        $this->resourceName = $resource->routebase;
        $this->rules = $resource->validationFieldStack();
        $this->item = $item;

        collect($resource->formFieldStack('edit'))->each(function ($field) {
            $value = $field->item($this->item)->getValue();
            $this->fields[$field->getName()] = $value;
        });
    }

    public function render()
    {
        $resource = $this->resource();
        $resource = $resource->item($this->item->id);

        return view($this->component, [
            'resource' => $resource,
        ]);
    }

    public function submit()
    {
        $this->validate();

        $resource = $this->resource();

        if (method_exists($resource, 'sluggify')) {
            $this->fields = $resource->sluggify($this->fields);
        }

        $this->item->update($this->fields);

        return redirect($resource->show($this->item->id));
    }
}
