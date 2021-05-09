<?php

namespace AngryMoustache\Rambo\Resource;

use AngryMoustache\Rambo\Resource\Actions\DeleteAction;
use AngryMoustache\Rambo\Resource\Actions\EditAction;
use AngryMoustache\Rambo\Resource\Actions\ShowAction;
use AngryMoustache\Rambo\Resource\Traits\Fields;
use AngryMoustache\Rambo\Resource\Traits\Labels;
use AngryMoustache\Rambo\Resource\Traits\Queries;
use AngryMoustache\Rambo\Resource\Traits\Routing;
use AngryMoustache\Rambo\Resource\Traits\Searching;
use AngryMoustache\Rambo\Resource\IndexActions\CreateAction;
use Illuminate\Support\Str;

abstract class Resource
{
    use Fields;
    use Labels;
    use Queries;
    use Routing;
    use Searching;

    public $model;

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

    public function indexActions()
    {
        return [
            CreateAction::class,
        ];
    }

    public function actions()
    {
        return [
            ShowAction::class,
            EditAction::class,
            DeleteAction::class,
        ];
    }
}
