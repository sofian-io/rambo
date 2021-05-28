<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

use AngryMoustache\Media\Models\Attachment;
use AngryMoustache\Rambo\Resource\Resource;
use Illuminate\Support\Str;

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
                return [$folder => Str::of(implode(' ', preg_split('/(?=[A-Z])/', $folder)))
                    ->afterLast('.')
                    ->ucfirst()
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
        $this->currentFolder = $folder;
    }

    // public function setFilters(Resource $resource)
    // {
    //     $this->changeFolder($this->currentFolder);

    //     if ($filterQuery = request()->get('filterQuery')) {
    //         $this->filters = json_decode(base64_decode($filterQuery), true);
    //         $this->filterQuery = $filterQuery;
    //         $this->currentFolder = $this->filters['folder-filter']['fields']['folder_location'] ?? '0';
    //     }
    // }

    // public function changeFolder($folder)
    // {
    //     $this->currentFolder = $folder;
    //     $this->filters['folder-filter'] = [
    //         'enabled' => true,
    //         'fields' => ['folder_location' => $this->currentFolder]
    //     ];

    //     $this->updatedFilters();
    // }
}
