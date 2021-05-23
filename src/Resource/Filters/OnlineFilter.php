<?php

namespace AngryMoustache\Rambo\Resource\Filters;

use AngryMoustache\Rambo\Resource\Fields\BooleanField;

class OnlineFilter extends Filter
{
    public function fields()
    {
        return [
            BooleanField::make('online'),
        ];
    }

    public function handle($query, $value = null)
    {
        return $query->where('online', $value);
    }
}
