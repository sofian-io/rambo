<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

use AngryMoustache\Rambo\Resource\Actions\LinkAction;

class OverviewAction extends LinkAction
{
    public $icon = 'fas fa-table';

    public $label = 'Overview';

    public function getLink()
    {
        return $this->resource->index();
    }
}
