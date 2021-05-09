<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

use AngryMoustache\Rambo\Facades\Rambo;
use AngryMoustache\Rambo\Resource\Resource;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTable extends Component
{
    use WithPagination;

    public $resourceName;

    public $search = '';

    public $sortCol = '';
    public $sortDir = '';

    public $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount(Resource $resource)
    {
        $this->resourceName = $resource->routebase;

        $this->sortCol = request()->get('sortCol') ?? $resource->defaultSortCol();
        $this->sortDir = request()->get('sortDir') ?? $resource->defaultSortDir();
        $this->queryString['sortCol'] = ['except' => $resource->defaultSortCol()];
        $this->queryString['sortDir'] = ['except' => $resource->defaultSortDir()];
    }

    public function render()
    {
        $resource = $this->resource();

        $items = $resource
            ->indexQuery()
            ->orderBy($this->sortCol, $this->sortDir)
            ->when($this->search !== '', function ($query) use ($resource) {
                foreach ($resource->searchableFields() as $field) {
                    $query->orWhere($field, 'LIKE', "%{$this->search}%");
                }
            })
            ->paginate($resource->paginate ?? 10);

        return view('rambo::livewire.crud.index-table', [
            'resource' => $resource,
            'items' => $items,
        ]);
    }

    public function resource()
    {
        return Rambo::resource($this->resourceName);
    }

    public function updatedSearch()
    {
        $this->page = 1;
    }

    public function changeSort($column)
    {
        if ($this->sortCol === $column) {
            $this->sortDir = ($this->sortDir === 'desc' ? 'asc' : 'desc');
        } else {
            $this->sortCol = $column;
            $this->sortDir = 'asc';
        }
    }
}
