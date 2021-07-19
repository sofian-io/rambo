<?php

namespace AngryMoustache\Rambo\Resource\ShowActions;

use AngryMoustache\Rambo\Resource\Actions\LinkAction;

class EditAction extends LinkAction
{
    public $icon = 'far fa-edit';

    public $label = 'Edit';

    public function getLink()
    {
        return $this->resource->edit($this->item->id);
    }
}
