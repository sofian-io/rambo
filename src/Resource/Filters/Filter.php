<?php

namespace AngryMoustache\Rambo\Resource\Filters;

use AngryMoustache\Rambo\Facades\Rambo;
use Illuminate\Support\Str;

abstract class Filter
{
    public $name = null;

    public $livewireKey = null;

    public function __construct()
    {
        $this->name = $this->getName();
        $this->livewireKey = Str::kebab($this->name);
    }

    abstract public function fields();

    abstract public function handle($query, $value = null);

    public function getName()
    {
        return $this->name ?? Rambo::getNameFromClassName(get_class($this));
    }

    public function getLivewireKey()
    {
        return $this->livewireKey;
    }
}
