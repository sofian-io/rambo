<?php

namespace AngryMoustache\Rambo\Fields;

use AngryMoustache\Rambo\Fields\Traits\HandlesRendering;
use Closure;

class Field
{
    use HandlesRendering;

    /**
     * This is, in fact, a field
     * @var boolean
     */
    public $isField = true;

    /**
     * The fields name
     * @var string
     */
    public $name;

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    /**
     * Get anything on the field
     * @return mixed
     */
    public function __get($name)
    {
        return $this->{$name} ?? null;
    }

    /**
     * Add an attribute to the field
     * @return self
     */
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

    /**
     * Create a new field instance
     * @return self
     */
    public static function make($name = null)
    {
        return new static($name);
    }

    /**
     * Return parsed field value when saving/updating
     * @return string|null
     */
    public function getParsedValue()
    {
        return $this->getValue();
    }
}
