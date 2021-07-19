<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class ParseAction extends Action
{
    public function render()
    {
        $currentUrl = $this->getCurrentUrl();
        $link = $this->getLink();

        if ($currentUrl === $link) {
            return '';
        }

        return view($this->component, [
            'label' => $this->getLabel(),
            'icon' => $this->getIcon(),
            'currentUrl' => $currentUrl,
            'parseAction' => static::class,
            'item' => $this->item,
            'resource' => $this->resource,
        ]);
    }

    public function parse($item)
    {
        //
    }
}
