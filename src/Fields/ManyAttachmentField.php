<?php

namespace AngryMoustache\Rambo\Fields;

use AngryMoustache\Media\Models\Attachment;

class ManyAttachmentField extends Field
{
    public $hasManyRelation = true;

    public $component = 'rambo::fields.many-attachment';

    public $showComponent = 'rambo::fields.show.many-attachment';
}
