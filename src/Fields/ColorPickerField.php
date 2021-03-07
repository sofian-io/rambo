<?php

namespace AngryMoustache\Rambo\Fields;

class ColorPickerField extends TextField
{
    public $type = 'color';

    public $inputClass = 'w-1/3 border rounded m-1';

    public $component = 'rambo::fields.color';

    public $showComponent = 'rambo::fields.show.color';
}
