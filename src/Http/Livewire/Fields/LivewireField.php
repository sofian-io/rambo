<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

use Livewire\Component;

class LivewireField extends Component
{
    public $name;
    public $value;

    public function mount($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function emitValue($value = null)
    {
        $this->emit(
            'field:update',
            $value ?? $this->value,
            $this->name
        );
    }
}
