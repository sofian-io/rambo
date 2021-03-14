<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use AngryMoustache\Media\Models\Attachment;
use Livewire\Component;

class ManyAttachmentPicker extends Component
{
    public $name;
    public $label;

    public $attachments = [];

    protected $listeners = [
        'addAttachment' => 'addAttachment'
    ];

    public function mount($field)
    {
        $this->name = $field->getName();
        $this->label = $field->getLabel();

        $this->attachments = collect($field->getValue() ?? [])
            ->map(fn ($item) => $this->getAttachment($item->id))
            ->toArray();
    }

    public function render()
    {
        return view('rambo::livewire.many-attachment-picker');
    }

    public function addAttachment($value)
    {
        if ($value) {
            $this->attachments[] = $this->getAttachment($value);
            $this->updateParent();
        }
    }

    public function removeAttachment($key)
    {
        unset($this->attachments[$key]);
        $this->updateParent();
    }

    public function updateParent()
    {
        $this->emit(
            'field:update',
            collect($this->attachments)->pluck('id')->toArray(),
            $this->name,
        );
    }

    public function getAttachment($id)
    {
        return [
            'id' => $id,
            'preview' => Attachment::find($id)->format('thumb'),
        ];
    }
}
