<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

class CreateAction extends IndexAction
{
    public $icon = 'go-plus-16';

    public $label = 'Create';

    public function link()
    {
        return $this->resource->create();
    }
}
