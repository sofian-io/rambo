<?php

namespace AngryMoustache\Rambo\Rambo;

use AngryMoustache\Rambo\Fields\Button;
use AngryMoustache\Rambo\Fields\TextField;
use AngryMoustache\Rambo\Form;

class StaticString extends Form
{
    public static $routeBase = 'static-strings';

    public static $nameField = 'name';

    public static $label = 'Static Strings';
    public static $labelSingular = 'Static String';

    public static $model = 'AngryMoustache\Rambo\Models\StaticString';

    public function fields()
    {
        return [
            TextField::make('scope')
                ->label('Scope')
                ->rules('required'),

            TextField::make('key')
                ->label('Key')
                ->rules('required'),

            TextField::make('value')
                ->label('Value')
                ->rules('required'),

            Button::make('submit')
                ->label('Submit'),
        ];
    }
}
