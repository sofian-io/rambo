<?php

namespace AngryMoustache\Rambo\Rambo;

use AngryMoustache\Rambo\Fields\AttachmentField;
use AngryMoustache\Rambo\Fields\Button;
use AngryMoustache\Rambo\Fields\TextField;
use AngryMoustache\Rambo\Fields\PasswordField;
use AngryMoustache\Rambo\Form;

class Administrator extends Form
{
    public static $routeBase = 'administrators';

    public static $nameField = 'username';

    public static $label = 'Administrators';
    public static $labelSingular = 'Administrator';

    public static $model = 'AngryMoustache\Rambo\Models\Administrator';

    public function fields()
    {
        return [
            TextField::make('username')
                ->label('Username')
                ->rules('required'),

            TextField::make('email')
                ->label('E-Mail')
                ->rules('required'),

            PasswordField::make('password')
                ->label('Password')
                ->hideFrom(['index', 'show']),

            AttachmentField::make('avatar_id')
                ->label('Avatar'),

            Button::make('submit')
                ->label('Submit'),
        ];
    }
}
