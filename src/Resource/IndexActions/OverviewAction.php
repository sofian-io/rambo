<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

class OverviewAction extends IndexAction
{
    public $icon = 'fas fa-table';

    public $label = 'Overview';

    public function getLink()
    {
        return $this->resource->index();
    }
}
