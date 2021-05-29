<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

use AngryMoustache\Rambo\Http\Livewire\RamboComponent;

class LivewireField extends RamboComponent
{
    public $clearOnUpdate;
    public $emit;
    public $unsetEmit = 'field:unset';

    public $name;
    public $value;
    public $label;
    public $placeholder;
    public $readonly;

    public function mount($field, $emit = null, $clearOnUpdate = null)
    {
        $this->clearOnUpdate = $clearOnUpdate ?? false;
        $this->emit = $emit ?? 'field:update';

        $this->name = optional($field)->getName();
        $this->value = optional($field)->getValue();
        $this->label = optional($field)->getLabel();
        $this->placeholder = optional($field)->placeholder ?? $this->label;
        $this->readonly = optional($field)->readonly;
    }

    public function emitValue($value = null, $emit = null, $name = null)
    {
        $this->emitUp(
            $emit ?? $this->emit,
            $value ?? $this->value,
            $name ?? $this->name
        );

        if ($this->clearOnUpdate) {
            $this->clearValue();
        }
    }

    public function clearValue()
    {
        $this->value = null;
    }

    public function unsetField()
    {
        $this->emit($this->unsetEmit, $this->name);
    }
}
