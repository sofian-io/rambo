<?php

namespace AngryMoustache\Rambo\Resource\Fields;

use AngryMoustache\Media\Models\Attachment;

class ImageField extends Field
{
    public $showComponent = 'rambo::fields.show.image';

    public function getShowValue()
    {
        return optional(Attachment::find(parent::getValue()))->path();
    }
}
