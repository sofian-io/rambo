<?php

namespace AngryMoustache\Rambo\Resource\Fields;

class TabGroup extends Field
{
    public $component = 'rambo::fields.form.tab-group';

    public $showComponent = 'rambo::fields.show.tab-group';

    public $hideLabel = true;

    public function getTabs()
    {
        return $this->tabs;
    }

    public function getDefaultTab()
    {
        return collect($this->getTabs())
            ->keys()
            ->first();
    }

    public function getFields()
    {
        return $this->fields;
    }
}
