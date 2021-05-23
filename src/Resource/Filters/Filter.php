<?php

namespace AngryMoustache\Rambo\Resource\Filters;

use AngryMoustache\Rambo\Facades\Rambo;

abstract class Filter
{
    public $name = null;

    public function __construct()
    {
        $this->name = $this->getName();
    }

    abstract public function fields();

    abstract public function handle($query, $value = null);

    public function getName()
    {
        return $this->name ?? Rambo::getNameFromClassName(get_class($this));
    }
}
