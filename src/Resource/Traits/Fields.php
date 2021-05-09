<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Fields
{
    public $fields;

    abstract public function fields();

    public function fieldStack($stack)
    {
        return collect($this->fields())
            ->reject(fn ($field) => in_array($stack, $field->hideFrom ?? []))
            ->filter(fn ($field) => $field->isField)
            ->toArray();
    }

    public function formFieldStack($stack)
    {
        return collect($this->fields())
            ->reject(fn ($field) => in_array($stack, $field->hideFrom ?? []))
            ->toArray();
    }

    public function validationFieldStack()
    {
        return collect($this->fields())
            ->whereNotNull('rules')
            ->mapWithKeys(fn ($field) => ["fields.{$field->getName()}" => $field->rules])
            ->toArray();
    }
}
