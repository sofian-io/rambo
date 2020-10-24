<?php

namespace AngryMoustache\Rambo;

abstract class Form
{
    public $fields = null;

    public $binding = 'form';

    abstract public function fields();

    public function __construct()
    {
        $this->fields = $this->fields();
    }

    public function render()
    {
        $binding = $this->getBinding();
        $fields = $this->getFullFieldStack();

        return view("rambo::forms.$binding", [
            'fields' => $fields
        ]);
    }

    public function getBinding()
    {
        return $this->binding;
    }

    public function getFullFieldStack()
    {
        return collect($this->fields())
            ->each(function($field) {
                $field->binding = $this->getBinding();
            });
    }
}
