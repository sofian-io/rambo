<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Sluggable
{
    public function getSlugField()
    {
        return optional($this)->slugField ?? 'slug';
    }

    public function getSlugNameField()
    {
        return optional($this)->slugNameField ?? 'name';
    }

    public function getSlugKey()
    {
        return $this->getSlugField() ?? 'slug';
    }
}
