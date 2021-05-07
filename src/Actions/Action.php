<?php

namespace AngryMoustache\Rambo\Actions;

abstract class Action
{
    public $component = 'rambo::components.actions.action';

    public $icon = '';

    public $label = 'Action';

    abstract public function handle($resource, $selections);

    public function render()
    {
        return view($this->component, [
            'action' => $this,
        ]);
    }

    public function key($key)
    {
        $this->key = $key;
        return $this;
    }
}
