<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class Action
{
    public $component = 'rambo::components.crud.action';
    public $icon;
    public $item;
    public $label;
    public $resource;
    public $currentUrl;

    public function __construct($resource, $currentUrl = null, $item = null)
    {
        $this->resource = $resource;
        $this->item = $item ?? $resource->item;
        $this->currentUrl = $currentUrl;
    }

    public function getLink()
    {
        return '/';
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getCurrentUrl()
    {
        return $this->currentUrl;
    }
}
