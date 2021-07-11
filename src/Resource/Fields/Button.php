<?php

namespace AngryMoustache\Rambo\Resource\Fields;

class Button extends Field
{
    public $isField = false;

    public $component = 'rambo::fields.form.button';

    public $action = 'submit';

    public function getAction()
    {
        return $this->action;
    }
}
