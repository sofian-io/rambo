<?php

namespace AngryMoustache\Rambo\Fields;

use Closure;

class Field
{
    public $name;

    public $component;

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    public static function make($name = null)
    {
        return new static($name);
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
}
