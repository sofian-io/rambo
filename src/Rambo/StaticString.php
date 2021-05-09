<?php

namespace AngryMoustache\Rambo\Rambo;

use AngryMoustache\Rambo\Resource\Fields\Button;
use AngryMoustache\Rambo\Resource\Fields\TextareaField;
use AngryMoustache\Rambo\Resource\Fields\TextField;
use AngryMoustache\Rambo\Resource\Resource;

class StaticString extends Resource
{
    public $routebase = 'static-strings';

    public $displayName = 'name';

    public $model = 'AngryMoustache\Rambo\Models\StaticString';

    public function fields()
    {
        return [
            TextField::make('scope')
                ->label('Scope')
                ->rules('required'),

            TextField::make('key')
                ->label('Key')
                ->rules('required'),

            TextareaField::make('value')
                ->label('Value')
                ->rules('required'),

            Button::make('submit')
                ->label('Submit'),
        ];
    }
}
