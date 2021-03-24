<?php

namespace AngryMoustache\Rambo\Actions;

class MassToggle extends Action
{
    public $label = 'Online/Offline';

    public $icon = 'fas fa-exchange-alt';

    public function handle($resource, $selections)
    {
        $model = $resource::getModel();

        foreach ($selections as $id) {
            $item = $model::findOrFail($id);
            $item->online = ! $item->online;
            $item->save();
        }
    }
}
