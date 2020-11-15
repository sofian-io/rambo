<?php

namespace AngryMoustache\Rambo\Fields;

class FileSizeField extends Field
{
    public $component = 'rambo::fields.text';

    public function getValue()
    {
        $value = parent::getValue();
        if ($value && gettype($value) === 'integer') {
            $value = ($value / 1000) . ' Mb';
        }

        return $value;
    }
}
