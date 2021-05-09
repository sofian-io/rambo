<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

class IndexAction
{
    public $component = 'rambo::components.crud.action';
    public $icon;
    public $resource;
    public $label;

    public function __construct($resource)
    {
        $this->resource = $resource;
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
