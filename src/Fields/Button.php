<?php

namespace AngryMoustache\Rambo\Fields;

class Button extends NonField
{
    /**
     * The fields blade component
     * @var string
     */
    public $component = 'rambo::non-fields.button';

    /**
     * Field tailwind styles
     * @var string
     */
    public $wrapperClass = 'w-2/3';
    public $inputClass = 'rambo-button';
}
