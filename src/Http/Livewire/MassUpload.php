<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use AngryMoustache\Media\Models\Attachment;
use Livewire\Component;
use Livewire\WithFileUploads;

class MassUpload extends Component
{
    use WithFileUploads;

    public $uploads = [];

    public $new = [];

    public function render()
    {
        $this->uploads = array_merge($this->new, $this->uploads);
        $this->new = [];

        return view('rambo::livewire.mass-upload');
    }

    public function upload()
    {
        foreach ($this->uploads as $upload) {
            Attachment::livewireUpload($upload);
        }

        $this->uploads = [];
    }
}
