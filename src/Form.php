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
     * The searchable fields
     * @var array
     */
    public static $searchFields = ['id'];

    /**
     * Defined fields
     * @return array
     */
    abstract public function fields();

    /**
     * Blade component to use when called by HABTM field
     * @return array
     */
    public static $habtmComponent = 'rambo::components.habtm.item';

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
    public function getFullFieldStack($page = null)
    {
        return collect($this->fields)
            ->filter(fn ($field) => (! $page || ! in_array($page, $field->hideFrom)))
            ->each(function($field) {
                $field->binding = $this->getBinding();
            });
    }

    /**
     * Get all the fields of the form
     * @return Collection
     */
    public function getOnlyFieldsStack($page = null)
    {
        return $this->getFullFieldStack($page)
            ->filter(fn ($field) => $field->isField);
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

    /**
     * Do custom things just before saving
     * @param array $fields The fields array from the form controller
     * @param integer|null $id The id of the current item if there is one
     * @return array
     */
    public function beforeSave($fields, $id = null)
    {
        return $fields;
    }
}
