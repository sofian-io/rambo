<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

use AngryMoustache\Media\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AttachmentPicker extends LivewireField
{
    use WithFileUploads;
    use WithPagination;

    public $upload;
    public $search = '';
    public $folder = '';
    public $uploading = false;
    public $selecting = false;
    public $multipleUpload;

    public function mount(
        $field,
        $emit = 'picker:update',
        $clearOnUpdate = null,
        $folder = null,
        $multipleUpload = false
    ) {
        parent::mount($field, $emit, $clearOnUpdate);
        $this->value = Attachment::find($this->value);
        $this->folder = $folder ?? $field->folder ?? 'uploads';
        $this->multipleUpload = $multipleUpload;
    }

    public function render()
    {
        $attachments = [];
        if ($this->selecting) {
            $attachments = Attachment::where('alt_name', 'LIKE', "%{$this->search}%")
                ->orWhere('original_name', 'LIKE', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
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
        if (is_array($this->upload)) {
            $this->createMulipleAttachmentsFromUpload();
            $this->upload = null;
            return;
        }

        $attachment = $this->createAttachmentFromUpload();

        $this->upload = null;
        if (optional($attachment)->id) {
            $this->updateAttachment($attachment);
        }
    }

    public function createMulipleAttachmentsFromUpload()
    {
        foreach ($this->upload as $upload) {
            $attachment = $this->createAttachmentFromUpload($upload);

            if (optional($attachment)->id) {
                $this->updateAttachment($attachment);
            }
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

    private function createAttachmentFromUpload($file = null)
    {
        $file ??= $this->upload;

        if (! is_file($file->getRealPath())) {
            return null;
        }

        $original = $file->getClientOriginalName();
        $fileInfo = getimagesize($file->getRealPath());

        $attachment = Attachment::firstOrCreate([
            'original_name' => $original,
            'alt_name' => $original,
            'disk' => config('media.default-disk', 'public'),
            'width' => $fileInfo[0],
            'height' => $fileInfo[1],
            'mime_type' => $fileInfo['mime'],
            'size' => filesize($file->getRealPath()),
            'extension' => $file->guessExtension(),
            'folder_location' => $this->folder,
        ]);

        Storage::putFileAs(
            "public/attachments/{$attachment->id}/",
            $file->getRealPath(),
            $file->getClientOriginalName()
        );

        return $attachment;
    }
}
