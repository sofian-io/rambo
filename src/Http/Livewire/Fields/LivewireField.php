<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

use Livewire\Component;

class LivewireField extends Component
{
    public $clearOnUpdate;
    public $emit;
    public $name;
    public $value;

    public function mount($name, $value, $emit = null, $clearOnUpdate = null)
    {
        $this->clearOnUpdate = $clearOnUpdate ?? false;
        $this->emit = $emit ?? 'field:update';
        $this->name = $name;
        $this->value = $value;
    }

    public function emitValue($value = null)
    {
        $this->emit(
            $this->emit,
            $value ?? $this->value,
            $this->name
        );

        if ($this->clearOnUpdate) {
            $this->clearValue();
        }
    }

    public function clearValue()
    {
        $this->value = null;
    }
}
