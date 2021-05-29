<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

use AngryMoustache\Rambo\Facades\Rambo;

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
        Rambo::toast($this->resource()->getSingularLabel() . ' succesfully deleted');
        return redirect($this->resource()->index());
    }
}
