<?php

namespace AngryMoustache\Rambo\Resource\ShowActions;

use AngryMoustache\Rambo\Resource\Actions\LinkAction;

class ShowAction extends LinkAction
{
    public $icon = 'far fa-eye';

    public $label = 'Show';

    public function getLink()
    {
        return $this->resource->show($this->item->id);
    }
}
