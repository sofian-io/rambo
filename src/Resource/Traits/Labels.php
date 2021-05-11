<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Labels
{
    public $label;
    public $singularLabel;
    public $displayName = 'id';
    public $primaryField = 'id';

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function getPrimaryField()
    {
        return $this->primaryField;
    }

    public function getItemName()
    {
        return $this->item->{$this->getDisplayName()};
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getSingularLabel()
    {
        return $this->singularLabel;
    }
}
