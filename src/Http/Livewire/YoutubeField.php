<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use Livewire\Component;

class YoutubeField extends Component
{
    public $name;

    public function mount($field)
    {
        $this->name = $field->getName();
    }

    public function render()
    {
        $this->items = $this->targetModel::orderBy('id', 'desc');
        foreach ($this->searchFields as $field) {
            $this->items = $this->items->where($field, 'LIKE', "%{$this->search}%");
        }

        $this->items = $this->items->get();

        $this->emit('field:update', $this->selections, $this->name);

        return view('rambo::livewire.habtm-picker');
    }
}
