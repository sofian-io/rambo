<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class DeleteAction extends Action
{
    public $icon = '<x-go-eye-16 />';

    public $label = 'Delete';

    public function link()
    {
        return $this->resource->delete($this->item->id);
    }
}
