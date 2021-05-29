<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

use AngryMoustache\Rambo\Resource\Actions\Action;

class IndexAction extends Action
{
    public $component = 'rambo::components.crud.action';

    public function __construct($resource, $currentUrl)
    {
        $this->resource = $resource;
        $this->currentUrl = $currentUrl;
    }
}
