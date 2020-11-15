<?php

namespace AngryMoustache\Rambo\Fields;

use AngryMoustache\Media\Models\Attachment;

class AttachmentField extends Field
{
    public $component = 'rambo::fields.attachment';

    public $showComponent = 'rambo::fields.show.attachment';

    public function getValue()
    {
        return Attachment::find(parent::getValue()['id'] ?? parent::getValue());
    }

    public function getParsedValue()
    {
        return $this->getValue()['id']
            ?? optional($this->getValue())->id
            ?? null;
    }
}
