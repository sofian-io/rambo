<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud\Traits;

trait HasDeleteAction
{
    public $deleting = null;

    public function openDeleteModal($id)
    {
        $resource = $this->resource();
        $this->deleting = [
            'id' => $id,
            'name' => $resource->model()::withoutGlobalScopes()->find($id)->{$resource->getDisplayName()},
        ];
    }

    public function deleteItem($id)
    {
        $this->resource()->model()::withoutGlobalScopes()->find($id)->delete();
        $this->deleting = null;
    }

    public function closeDeleteModal()
    {
        $this->deleting = null;
    }
}
