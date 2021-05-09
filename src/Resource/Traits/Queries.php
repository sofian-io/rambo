<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Queries
{
    public $item;

    public $defaultSortCol = 'id';

    public $defaultSortDir = 'desc';

    public function query()
    {
        return $this->model()::withoutGlobalScopes();
    }

    public function indexQuery()
    {
        return $this->query();
    }

    public function item($id)
    {
        $this->item = $this->model()::withoutGlobalScopes()->find($id);
        return $this;
    }

    public function defaultSortCol()
    {
        return $this->defaultSortCol;
    }

    public function defaultSortDir()
    {
        return $this->defaultSortDir;
    }
}
