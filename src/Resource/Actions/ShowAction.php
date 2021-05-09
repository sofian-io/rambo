<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class ShowAction extends Action
{
    public $icon = 'far fa-eye';

    public function link()
    {
        return $this->resource->show($this->item->id);
    }
}
