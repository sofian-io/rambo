<?php

namespace AngryMoustache\Rambo\Resource\Actions;

class LinkAction extends Action
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
            'link' => $link,
            'currentUrl' => $currentUrl,
        ]);
    }
}
