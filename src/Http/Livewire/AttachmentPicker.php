<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use AngryMoustache\Media\Models\Attachment;
use AngryMoustache\Rambo\Fields\Field;
use Livewire\Component;
use Livewire\WithFileUploads;

class AttachmentPicker extends Component
{
    use WithFileUploads;

    public $item = null;
    public $picked = null;
    public $name = null;
    public $selecting = false;
    public $uploading = false;
    public $upload;

    public function mount($field)
    {
        $this->name = $field->getName();
        $this->item = optional($field->getValue())->id;
    }

    public function openSelectingModal()
    {
        $this->selecting = true;
    }

    public function openUploadingModal()
    {
        $this->uploading = true;
    }

    public function closeModal()
    {
        $this->selecting = false;
        $this->uploading = false;
    }

    public function chooseAttachment($attachment)
    {
        $this->item = $attachment;
        $this->picked = $attachment;
        $this->closeModal();
        $this->emit('field:update', $attachment, $this->name);
    }

    public function uploadFile()
    {
        $attachment = Attachment::lubeUpload($this->upload);
        if (optional($attachment)->id) {
            $this->chooseAttachment($attachment->id);
        }
    }

    public function resetImage()
    {
        $this->item = null;
        $this->picked = null;
        $this->chooseAttachment(null);
    }

    public function render()
    {
        if ($this->item) {
            $item = Attachment::find($this->item);
            if ($item) {
                $this->item = $item->format('thumb');
            }
        }

        if ($this->selecting) {
            $attachments = Attachment::get();
            return view('rambo::livewire.attachment-picker', [
                'attachments' => $attachments
            ]);
        }

        return view('rambo::livewire.attachment-picker');
    }
}
