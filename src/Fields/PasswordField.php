<?php

namespace AngryMoustache\Rambo\Fields;

use AngryMoustache\Rambo\RamboAuth;

class PasswordField extends Field
{
    public $component = 'rambo::fields.text';

    public $type = 'password';

    public function getValue()
    {
        return null;
    }

    public function getParsedValue()
    {
        $value = optional($this->item)[$this->getName()];
        if (! $value) {
            return '__unset__';
        }

        return RamboAuth::hash($value);
    }
}
