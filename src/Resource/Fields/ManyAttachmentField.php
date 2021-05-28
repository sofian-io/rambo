<?php

namespace AngryMoustache\Rambo\Resource\Fields;

use AngryMoustache\Rambo\Rambo\Attachment;

class ManyAttachmentField extends HabtmField
{
    public $component = 'rambo::fields.form.many-attachment';

    public $showComponent = 'rambo::fields.show.many-attachment';

    public $resource = Attachment::class;

    public $folder = 'uploads';
}
