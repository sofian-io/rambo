<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class EditAction extends Action
{
    public $icon = 'go-eye-16';

    public $label = 'Edit';

    public function link()
    {
        return $this->resource->edit($this->item->id);
    }
}
