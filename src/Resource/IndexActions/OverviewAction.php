<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

class OverviewAction extends IndexAction
{
    public $icon = 'go-list-unordered-16';

    public $label = 'Overview';

    public function link()
    {
        return $this->resource->index();
    }
}
