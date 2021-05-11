<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class ShowAction extends Action
{
    public $icon = 'far fa-eye';

    public $label = 'Show';

    public function getLink()
    {
        return $this->resource->show($this->item->id);
    }
}
