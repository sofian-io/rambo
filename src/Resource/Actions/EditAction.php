<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class EditAction extends Action
{
    public $icon = 'far fa-edit';

    public function link()
    {
        return $this->resource->edit($this->item->id);
    }
}
