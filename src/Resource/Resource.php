<?php

namespace AngryMoustache\Rambo\Resource;

use AngryMoustache\Rambo\Resource\Traits\Fields;
use AngryMoustache\Rambo\Resource\Traits\Labels;
use AngryMoustache\Rambo\Resource\Traits\Queries;
use AngryMoustache\Rambo\Resource\Traits\Routing;
use AngryMoustache\Rambo\Resource\Traits\Searching;
use AngryMoustache\Rambo\Resource\Traits\Actions;
use Illuminate\Support\Str;

abstract class Resource
{
    use Actions;
    use Fields;
    use Labels;
    use Queries;
    use Routing;
    use Searching;

    public $model;

    public $indexTableView = 'rambo::components.crud.tables.index';

    public function __construct()
    {
        $this->fields = $this->fields();
        $this->singularLabel ??= Str::afterLast(get_class($this), '\\');
        $this->label ??= Str::plural($this->singularLabel);
        $this->routebase ??= Str::kebab($this->label);
        $this->model ??= 'App\\Models\\' . $this->singularLabel;
    }

    public function model()
    {
        return $this->model;
    }

    public function indexTableView()
    {
        return $this->indexTableView;
    }
}
