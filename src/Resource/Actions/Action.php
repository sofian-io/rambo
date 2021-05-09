<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class Action
{
    public $component = 'rambo::components.crud.action';
    public $icon;
    public $item;
    public $label;
    public $resource;

    public function __construct($resource, $item = null)
    {
        $this->resource = $resource;
        $this->item = $item ?? $resource->item;
    }

    public function render()
    {
        return view($this->component, [
            'label' => $this->label(),
            'icon' => $this->icon(),
            'link' => $this->link(),
        ]);
    }

    public function label()
    {
        return $this->label;
    }

    public function icon()
    {
        return $this->icon;
    }

    public function link()
    {
        return '/';
    }
}
