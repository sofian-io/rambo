<?php

namespace AngryMoustache\Rambo\Fields;

class BooleanField extends Field
{
    public $component = 'rambo::fields.boolean';

    public $showComponent = 'rambo::fields.show.boolean';

    public $fallbackValue = 0;

    public $inputWrapperClass = 'flex w-3/4';
    public $inputClass = 'h-4 w-4 px-2 py-1 border rounded m-1';
    public $labelWrapperClass = 'w-auto px-2';
}
