<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

use AngryMoustache\Rambo\Resource\Actions\LinkAction;

class CreateAction extends LinkAction
{
    public $icon = 'fas fa-plus';

    public $label = 'Create';

    public function getLink()
    {
        return $this->resource->create();
    }
}
