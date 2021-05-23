<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Filters
{
    public $filters;

    public function filters()
    {
        return [];
    }

    public function getFilters()
    {
        return collect($this->filters())
            ->map(fn ($filter) => new $filter())
            ->toArray();
    }
}
