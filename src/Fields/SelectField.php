<?php

namespace AngryMoustache\Rambo\Fields;

class SelectField extends Field
{
    /**
     * The fields blade component
     * @var string
     */
    public $component = 'rambo::fields.select';

    public $showComponent = 'rambo::fields.show.select';

    /**
     * The fields blade component
     * @var string
     */
    public $options = [
        null => 'Please add options() to your field'
    ];
}
