<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use AngryMoustache\Rambo\Fields\Field;
use Livewire\Component;

class YoutubePicker extends Component
{
    public $name;
    public $value;
    public $label;
    public $readonly;
    public $youtubeId;

    public function mount(Field $field)
    {
        $this->name = $field->getName();
        $this->value = $field->getValue();
        $this->label = $field->getLabel();
        $this->readonly = $field->readonly || $field->disabled;

        if ($this->value) {
            $this->value = 'https://youtu.be/' . $this->value;
        }
    }

    public function render()
    {
        preg_match(
            '/^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/',
            $this->value,
            $matches
        );

        $this->youtubeId = $matches[2] ?? null;
        $this->emit('field:update', $matches[2] ?? null, $this->name);

        return view('rambo::livewire.youtube-picker');
    }
}
