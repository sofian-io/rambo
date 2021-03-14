<?php

namespace AngryMoustache\Rambo\Fields;

class HabtmField extends Field
{
    public $hasManyRelation = true;

    public $component = 'rambo::fields.habtm';

    public $showComponent = 'rambo::fields.show.habtm';

    public $sortable = false;
}
