<?php

namespace AngryMoustache\Rambo;

use Illuminate\Support\Str;

abstract class Form
{
    public $fields = null;

    public $binding = 'livewire';

    public static $searchFields = ['id'];
    public static $defaultSort = 'id';
    public static $defaultSortDir = 'asc';

    public static $routeBase = null;

    public static $nameField = null;

    public static $label = null;
    public static $labelSingular = null;

    public static $model = null;

    public static $habtmComponent = 'rambo::components.habtm.item';

    abstract public function fields();

    public function __construct()
    {
        $this->fields = $this->fields();
    }

    public function getBinding()
    {
        return $this->binding;
    }

    public static function getRouteBase()
    {
        return static::$routeBase ?? Str::of(get_called_class())
            ->afterLast('\\')
            ->title()
            ->plural()
            ->slug()
            ->__toString();
    }

    public static function getNameField()
    {
        return static::$nameField ?? 'name';
    }

    public static function getLabel()
    {
        return static::$label ?? Str::of(get_called_class())
            ->afterLast('\\')
            ->title()
            ->plural();
    }

    public static function getLabelSingular()
    {
        return static::$label ?? Str::of(get_called_class())
            ->afterLast('\\')
            ->title();
    }

    public static function getModel()
    {
        return static::$model ?? Str::of(get_called_class())
            ->afterLast('\\')
            ->prepend('App\\Models\\')
            ->__toString();
    }

    public function getFullFieldStack($page = null)
    {
        return collect($this->fields)
            ->filter(fn ($field) => (! $page || ! in_array($page, $field->hideFrom)))
            ->each(function($field) {
                $field->binding = $this->getBinding();
            });
    }

    public function getOnlyFieldsStack($page = null)
    {
        return $this->getFullFieldStack($page)
            ->filter(fn ($field) => $field->isField);
    }

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

    public function beforeSave($fields, $id = null)
    {
        return $fields;
    }
}
