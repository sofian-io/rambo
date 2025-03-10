<?php

namespace AngryMoustache\Rambo\Resource\Fields;

class FileSizeField extends Field
{
    public function getShowValue()
    {
        $value = parent::getShowValue();
        if ($value && gettype($value) === 'integer') {
            $value = ($value / 1000) . ' Mb';
        }

        return $value;
    }
}
