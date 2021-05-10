<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class ShowAction extends Action
{
    public $icon = '<x-go-eye-16 />';

    public $label = 'Show';

    public function link()
    {
        return $this->resource->show($this->item->id);
    }
}
