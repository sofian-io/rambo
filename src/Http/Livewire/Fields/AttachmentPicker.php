<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

use AngryMoustache\Media\Models\Attachment;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AttachmentPicker extends LivewireField
{
    use WithFileUploads;
    use WithPagination;

    public $upload;
    public $search = '';
    public $uploading = false;
    public $selecting = false;

    public function render()
    {
        $attachments = [];
        if ($this->selecting) {
            $attachments = Attachment::where('alt_name', 'LIKE', "%{$this->search}%")
                ->orWhere('original_name', 'LIKE', "%{$this->search}%")
                ->paginate(15);
        }

        return view('rambo::livewire.fields.attachment-picker', [
            'attachments' => $attachments,
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function clearSelection()
    {
        $this->value = null;
        $this->emitValue(null);
    }

    public function uploadImage()
    {
        $attachment = Attachment::livewireUpload($this->upload);
        $this->upload = null;
        if (optional($attachment)->id) {
            $this->updateAttachment($attachment);
        }
    }

    public function updateAttachment($attachment)
    {
        if (is_integer($attachment)) {
            $attachment = Attachment::find($attachment);
        }

        $this->value = $attachment;
        $this->closeModal();
        $this->emitValue($attachment->id);
    }

    public function openUploadModal()
    {
        $this->uploading = true;
    }

    public function openSelectModal()
    {
        $this->selecting = true;
    }

    public function closeModal()
    {
        $this->selecting = false;
        $this->uploading = false;
    }

    public function getQueryString()
    {
        return $this->queryString;
    }
}
