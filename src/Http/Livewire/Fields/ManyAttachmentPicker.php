<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

use AngryMoustache\Media\Models\Attachment;

class ManyAttachmentPicker extends LivewireField
{
    protected $listeners = [
        'picker:update' => 'addAttachment',
    ];

    public function mount($name, $value, $emit = null, $clearOnUpdate = null)
    {
        parent::mount($name, $value, $emit, $clearOnUpdate);
        $this->value = Attachment::whereIn('id', $value)->get();
    }

    public function render()
    {
        return view('rambo::livewire.fields.many-attachment-picker');
    }

    public function addAttachment($value, $fieldName)
    {
        $this->value->push(Attachment::find($value));
        $this->emitValue($this->value->pluck('id'));
        $this->updated($fieldName);
    }

    public function removeAttachment($index)
    {
        $this->value->pull($index);
        $this->emitValue($this->value->pluck('id'));
        $this->updated($this->name);
    }
}
