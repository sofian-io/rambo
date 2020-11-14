<?php

namespace AngryMoustache\Rambo\Fields;

class TextareaField extends Field
{
    /**
     * The fields blade component
     * @var string
     */
    public $component = 'rambo::fields.textarea';

     /**
     * Default field tailwind styles
     * @var string
     */
    public $inputClass = 'h-48 w-full px-2 py-1 border rounded m-1';
}
