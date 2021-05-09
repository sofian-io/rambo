<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class Action
{
    public $component = 'rambo::components.crud.action';
    public $icon;
    public $item;
    public $resource;

    public function __construct($resource, $item)
    {
        $this->resource = $resource;
        $this->item = $item;
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
