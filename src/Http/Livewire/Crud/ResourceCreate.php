<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

use AngryMoustache\Rambo\Facades\Rambo;

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

        Rambo::toast($resource->getSingularLabel() . ' succesfully created');

        return redirect($resource->show($savedModel->id));
    }
}
