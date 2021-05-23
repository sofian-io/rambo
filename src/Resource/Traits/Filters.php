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
            ->mapWithKeys(function ($filter) {
                $filter = new $filter();
                return [$filter->getLivewireKey() => $filter];
            })
            ->toArray();
    }
}
