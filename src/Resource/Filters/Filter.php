<?php

namespace AngryMoustache\Rambo\Resource\Filters;

use AngryMoustache\Rambo\Resource\Fields\BooleanField;

class Filter
{
    public function fields()
    {
        return [
            BooleanField::make('online')->label('Online'),
        ];
    }

    public function handle($query, $value = null)
    {
        return $query;
    }
}
