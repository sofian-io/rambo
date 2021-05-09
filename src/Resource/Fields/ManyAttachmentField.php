<?php

namespace AngryMoustache\Rambo\Resource\Fields;

class ManyAttachmentField extends Field
{
    public $component = 'rambo::fields.form.many-attachment';

    public $showComponent = 'rambo::fields.show.many-attachment';

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
