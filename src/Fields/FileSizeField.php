<?php

namespace AngryMoustache\Rambo\Fields;

class FileSizeField extends Field
{
    public $component = 'rambo::fields.text';

    public function getValue()
    {
        if ($value = parent::getValue()) {
            $value = ($value / 1000) . ' Mb';
        }

        return $value;
    }
}
