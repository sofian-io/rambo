<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class EditAction extends Action
{
    public $icon = 'far fa-edit';

    public $label = 'Edit';

    public function getLink()
    {
        return $this->resource->edit($this->item->id);
    }
}
