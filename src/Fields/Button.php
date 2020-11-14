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
    public $inputClass = 'cursor-pointer rounded bg-red-800 px-10 py-2 '
                       . ' font-bold text-red-100 hover:bg-red-900';
}
