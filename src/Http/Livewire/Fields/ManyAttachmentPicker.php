<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

use AngryMoustache\Media\Models\Attachment;
use Illuminate\Database\Eloquent\Collection;

class ManyAttachmentPicker extends LivewireField
{
    public $folder;

    protected $listeners = [
        'picker:update' => 'addAttachment',
    ];

    public function mount($field, $emit = null, $clearOnUpdate = null)
    {
        parent::mount($field, $emit, $clearOnUpdate);
        $this->folder = $field->folder ?? 'uploads';

        $value = new Collection();
        foreach ($this->value as $attachment) {
            $value->push(Attachment::withoutGlobalScopes()->find($attachment));
        }

        $this->value = $value;
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

    public function sortAttachments($attachments)
    {
        $value = $this->value;
        $this->value = new Collection();

        foreach ($attachments as $attachment) {
            $this->value->push($value[$attachment['value']]);
        }

        $this->emitValue($this->value->pluck('id'));
    }
}
