<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class DeleteAction extends Action
{
    public $icon = 'far fa-trash-alt';

    public function link()
    {
        return $this->resource->delete($this->item->id);
    }
}
