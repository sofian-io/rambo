<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

class YoutubeLink extends LivewireField
{
    public $youtubeId;

    public function mount($field, $emit = null, $clearOnUpdate = null)
    {
        parent::mount($field, $emit, $clearOnUpdate);

        if ($this->value) {
            $this->value = "https://youtu.be/{$this->value}";
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
        $this->emitValue($this->youtubeId);

        return view('rambo::livewire.fields.youtube-link');
    }
}
