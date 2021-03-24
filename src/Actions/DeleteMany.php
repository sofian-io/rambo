<?php

namespace AngryMoustache\Rambo\Actions;

class DeleteMany extends Action
{
    public $icon = 'fa fa-trash';

    public $label = 'Delete';

    public function handle($resource, $selections)
    {
        $resource::getModel()::destroy($selections);
    }
}
