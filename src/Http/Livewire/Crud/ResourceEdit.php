<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

class ResourceEdit extends FormController
{
    public $component = 'rambo::livewire.crud.resource-edit';

    public $item;

    public function mount($resource, $item = null)
    {
        parent::mount($resource, $item);

        $this->item = $item;

        collect($resource->formFieldStack('edit'))->each(function ($field) {
            $value = $field->item($this->item)->getValue();
            if (! $field->dontAutoFillEdit) {
                $this->fields[$field->getName()] = $value;
            }
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

    public function saveData()
    {
        $resource = $this->resource();
        $this->item->update($this->fields);

        foreach ($this->habtmRelations() as $relation => $values) {
            $this->item->{$relation}()->detach();
            $this->item->{$relation}()->sync($values);
        }

        return redirect($resource->show($this->item->id));
    }
}
