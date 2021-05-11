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
            'label' => $this->getLabel(),
            'icon' => $this->getIcon(),
            'link' => $this->getLink(),
            'currentUrl' => $this->getCurrentUrl(),
        ]);
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
