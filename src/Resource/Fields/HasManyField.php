<?php

namespace AngryMoustache\Rambo\Resource\Fields;

class HasManyField extends HabtmField
{
    public $component = 'rambo::fields.form.has-many';

    public $showComponent = 'rambo::fields.show.has-many';

    public $hideFrom = ['edit', 'create', 'index'];
}
