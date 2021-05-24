<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Fields
{
    public $fields;

    abstract public function fields();

    // Index, Show
    public function fieldStack($stack = '', $flat = false)
    {
        return collect($this->fields())
            ->when($flat, function($fields) {
                return $fields->map(fn ($field) => $field->getNestedFields())->flatten();
            })
            ->reject(fn ($field) => in_array($stack, $field->hideFrom ?? []))
            ->filter(fn ($field) => $field->isField)
            ->toArray();
    }

    // Edit, Create
    public function formFieldStack($stack = '', $flat = false)
    {
        return collect($this->fields())
            ->when($flat, function($fields) {
                return $fields->map(fn ($field) => $field->getNestedFields())->flatten();
            })
            ->reject(fn ($field) => in_array($stack, $field->hideFrom ?? []))
            ->toArray();
    }

    // Edit, Create
    public function validationFieldStack()
    {
        return collect($this->fields())
            ->map(fn ($field) => $field->getNestedFields())
            ->flatten()
            ->whereNotNull('rules')
            ->mapWithKeys(fn ($field) => ["fields.{$field->getName()}" => $field->rules])
            ->toArray();
    }
}
