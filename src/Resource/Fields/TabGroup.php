<?php

namespace AngryMoustache\Rambo\Resource\Fields;

class TabGroup extends Field
{
    public $isField = false;

    public $component = 'rambo::fields.form.tab-group';

    public $showComponent = 'rambo::fields.show.tab-group';

    public function getTabs()
    {
        return $this->tabs;
    }

    public function getFields()
    {
        return $this->fields;
    }
}
