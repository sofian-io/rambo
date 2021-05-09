<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

class IndexAction
{
    public $component = 'rambo::components.crud.action';
    public $icon;
    public $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function render()
    {
        return view($this->component, [
            'icon' => $this->icon,
            'link' => $this->link(),
        ]);
    }

    public function link()
    {
        return '/';
    }
}
