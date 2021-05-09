<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

class PasswordInput extends LivewireField
{
    public $fieldType = 'password';

    public function mount($field, $emit = null, $clearOnUpdate = null)
    {
        parent::mount($field, $emit, $clearOnUpdate);
        $this->value = null;
    }

    public function render()
    {
        return view('rambo::livewire.fields.password-input');
    }

    public function updatedValue()
    {
        if (! empty($this->value)) {
            $this->emitValue();
        } else {
            $this->unsetField();
        }
    }
}
