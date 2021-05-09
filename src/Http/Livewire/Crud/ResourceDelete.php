<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

class ResourceDelete extends ResourceItem
{
    public $component = 'rambo::livewire.crud.resource-delete';

    public function cancel()
    {
        return redirect($this->resource()->show($this->item->id));
    }

    public function confirm()
    {
        $this->item->delete();
        return redirect($this->resource()->index());
    }
}
