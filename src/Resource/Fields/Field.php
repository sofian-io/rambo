<?php

namespace AngryMoustache\Rambo\Resource\Fields;

use Illuminate\Support\Str;
use Closure;

class Field
{
    public $name;
    public $component = 'rambo::fields.form.text';
    public $showComponent = 'rambo::fields.show.text';
    public $isField = true;

    public static function make($name = null)
    {
        return new static($name);
    }

    public function __construct($name = null, $label = null)
    {
        $this->name = $name;
        $this->label = $label ?? Str::of($name)->replace('_', ' ')->ucfirst();
    }

    public function __get($name)
    {
        return $this->{$name} ?? null;
    }

    public function __call($name, $value)
    {
        if ($value === []) {
            $this->{$name} = true;
        } else {
            $value = optional($value)[0];
            if ($value instanceof Closure) {
                $this->{$name} = call_user_func($value);
            } else {
                $this->{$name} = $value;
            }
        }

        return $this;
    }

    public function render()
    {
        return view($this->component, [
            'field' => $this
        ]);
    }

    public function renderShow()
    {
        return view($this->showComponent, [
            'field' => $this
        ]);
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBindingName()
    {
        return ($this->bindingName ?? 'fields') . '.' . $this->getName();
    }

    public function getValue()
    {
        return optional($this->item)[$this->getName()]
            ?? $this->fallbackValue
            ?? null;
    }

    public function getViewValue()
    {
        return $this->getValue();
    }

    public function beforeSave($value)
    {
        return $value;
    }

    public function getNestedFields()
    {
        return $this->fields ?? $this;
    }
}
