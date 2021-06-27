<?php

namespace AngryMoustache\Rambo\Resource;

use AngryMoustache\Rambo\Resource\Traits\Actions;
use AngryMoustache\Rambo\Resource\Traits\Fields;
use AngryMoustache\Rambo\Resource\Traits\Filters;
use AngryMoustache\Rambo\Resource\Traits\Labels;
use AngryMoustache\Rambo\Resource\Traits\Queries;
use AngryMoustache\Rambo\Resource\Traits\Rendering;
use AngryMoustache\Rambo\Resource\Traits\Routing;
use AngryMoustache\Rambo\Resource\Traits\Searching;
use Illuminate\Support\Str;

abstract class Resource
{
    use Actions;
    use Fields;
    use Filters;
    use Labels;
    use Queries;
    use Rendering;
    use Routing;
    use Searching;

    public $model;

    public function __construct()
    {
        $label = Str::ucfirst(implode(' ', preg_split('/(?=[A-Z])/', get_class($this))));
        $this->singularLabel ??= trim(Str::afterLast($label, '\\'));
        $this->label ??= trim(Str::plural($this->singularLabel));
        $this->routebase ??= Str::kebab($this->label);
        $this->model ??= 'App\\Models\\' . Str::afterLast(get_class($this), '\\');
    }

    public function model()
    {
        return $this->model;
    }
}
