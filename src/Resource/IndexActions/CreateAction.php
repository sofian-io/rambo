<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

class CreateAction extends IndexAction
{
    public $icon = 'fas fa-plus';

    public $label = 'Create';

    public function link()
    {
        return $this->resource->create();
    }
}
