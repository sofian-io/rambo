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

    public function render()
    {
        return view($this->component, [
            'label' => $this->label(),
            'icon' => $this->icon(),
            'link' => $this->link(),
            'currentUrl' => $this->currentUrl(),
        ]);
    }

    public function link()
    {
        return '/';
    }

    public function label()
    {
        return $this->label;
    }

    public function icon()
    {
        return $this->icon;
    }

    public function currentUrl()
    {
        return $this->currentUrl;
    }
}
