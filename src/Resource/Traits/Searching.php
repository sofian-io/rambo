<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Searching
{
    public $searchableFields = null;

    public function searchableFields()
    {
        return $this->searchableFields;
    }
}
