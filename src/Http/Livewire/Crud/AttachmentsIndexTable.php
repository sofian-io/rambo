<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

use AngryMoustache\Media\Models\Attachment;
use AngryMoustache\Rambo\Facades\Rambo;
use AngryMoustache\Rambo\Resource\Resource;

class AttachmentsIndexTable extends IndexTable
{
    public $folders;

    public $folderStructure;

    public $currentFolder = '__all';

    public $component = 'rambo::livewire.crud.attachments-table';

    public function mount(Resource $resource)
    {
        parent::mount($resource);
        $this->folders = Attachment::pluck('folder_location')
            ->unique()
            ->mapWithKeys(function ($folder) {
                return [
                    $folder => ucwords(
                        str_replace('.', ' - ',
                            implode(' ', preg_split('/(?=[A-Z])/', $folder))
                        )
                    )
                ];
            });

        $this->folders['__all'] = 'All';
        $this->folders = $this->folders->sort();
    }

    public function render()
    {
        if ($this->currentFolder !== '__all') {
            $this->filters['folder-filter'] = [
                'enabled' => true,
                'fields' => ['folder_location' => $this->currentFolder]
            ];
        } else {
            unset($this->filters['folder-filter']);
        }

        return parent::render();
    }

    public function changeFolder($folder)
    {
        $this->page = 1;
        $this->currentFolder = $folder;
    }
}
