<?php

namespace AngryMoustache\Rambo;

abstract class Form
{
    /**
     * The fields of the form
     * @var Collection
     */
    public $fields = null;

    /**
     * The binding method of the form
     * @var string
     */
    public $binding = 'livewire';

    /**
     * Defined fields
     * @return array
     */
    abstract public function fields();

    public function __construct()
    {
        $this->fields = $this->fields();
    }

    /**
     * Get the forms binding method
     * @return string
     */
    public function getBinding()
    {
        return $this->binding;
    }

    /**
     * Get all the fields of the form
     * @return Collection
     */
    public function getFullFieldStack()
    {
        return collect($this->fields)
            ->each(function($field) {
                $field->binding = $this->getBinding();
            });
    }

    /**
     * Get all the validation rules
     * @return Collection
     */
    public function getValidationRules()
    {
        $rules = [];
        collect($this->fields)
            ->each(function($field) use (&$rules) {
                if ($field->rules) {
                    $rules["fields.{$field->getName()}"] = $field->rules;
                }
            });

        return $rules;
    }
}
