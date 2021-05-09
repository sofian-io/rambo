<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Labels
{
    public $label;
    public $singularLabel;
    public $displayName = 'id';

    public function displayName()
    {
        return $this->displayName;
    }

    public function getItemName()
    {
        return $this->item->{$this->displayName()};
    }

    public function label()
    {
        return $this->label;
    }

    public function singularLabel()
    {
        return $this->singularLabel;
    }
}
