<?php

namespace AngryMoustache\Rambo\Resource\Fields;

use AngryMoustache\Media\Models\Attachment;

class AttachmentField extends Field
{
    public $component = 'rambo::fields.form.attachment';

    public $showComponent = 'rambo::fields.show.attachment';

    public function getViewValue()
    {
        return Attachment::find($this->getValue());
    }
}
