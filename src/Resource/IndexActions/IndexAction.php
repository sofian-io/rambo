<?php

namespace AngryMoustache\Rambo\Resource\IndexActions;

class IndexAction
{
    public $component = 'rambo::components.crud.action';
    public $icon;
    public $resource;
    public $label;
    public $currentUrl;

    public function __construct($resource, $currentUrl)
    {
        $this->resource = $resource;
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
