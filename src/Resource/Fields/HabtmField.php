<?php

namespace AngryMoustache\Rambo\Resource\Fields;

class HabtmField extends Field
{
    public $component = 'rambo::fields.form.habtm';

    public $showComponent = 'rambo::fields.show.habtm';

    public $hasManyRelation = true;

    public function getValue()
    {
        return (parent::getValue() ?? collect())->pluck('id');
    }

    public function getViewValue()
    {
        return parent::getValue();
    }
}
