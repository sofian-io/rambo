<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

class ResourceCreate extends FormController
{
    public $component = 'rambo::livewire.crud.resource-create';

    public function saveData()
    {
        $resource = $this->resource();
        $savedModel = $resource->model()::create($this->fields);

        foreach ($this->habtmRelations() as $relation => $values) {
            $savedModel->{$relation}()->sync($values);
        }

        return redirect($resource->show($savedModel->id));
    }
}
