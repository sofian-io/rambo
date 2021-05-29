<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

use AngryMoustache\Rambo\Facades\Rambo;
use AngryMoustache\Rambo\Http\Livewire\RamboComponent;
use AngryMoustache\Rambo\Resource\Resource;
use Livewire\WithPagination;

class IndexTable extends RamboComponent
{
    use WithPagination;

    public $resourceName;

    public $currentUrl;

    public $search = '';

    public $sortCol = '';
    public $sortDir = '';

    public $filterModal = false;
    public $filterQuery = '';
    public $filters = [];

    public $component = 'rambo::livewire.crud.index-table';

    public $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'filterQuery' => ['except' => ''],
    ];

    public function mount(Resource $resource)
    {
        $this->currentUrl = request()->url();
        $this->resourceName = $resource->routebase;

        $this->sortCol = request()->get('sortCol') ?? $resource->defaultSortCol();
        $this->sortDir = request()->get('sortDir') ?? $resource->defaultSortDir();
        $this->queryString['sortCol'] = ['except' => $resource->defaultSortCol()];
        $this->queryString['sortDir'] = ['except' => $resource->defaultSortDir()];

        $this->setFilters($resource);
    }

    public function render()
    {
        $resource = $this->resource();

        $query = $resource
            ->indexQuery()
            ->orderBy($this->sortCol, $this->sortDir)
            ->where(function ($query) use ($resource) {
                if ($this->search !== '') {
                    foreach ($resource->searchableFields() as $field) {
                        $query->orWhere($field, 'LIKE', "%{$this->search}%");
                    }
                }
            });

        foreach ($resource->getFilters() as $key => $filter) {
            if (
                ($this->filters[$key]['enabled'] ?? false) &&
                isset($this->filters[$key]['fields'])
            ) {
                $query = $filter->handle($query, $this->filters[$key]['fields']);
            }
        }

        $items = $query->paginate($resource->paginate ?? 10);

        $enabledFilters = collect($this->filters)
            ->filter(fn ($filter) => $filter['enabled'] ?? false)
            ->count();

        return view($this->component, [
            'resource' => $resource,
            'items' => $items,
            'enabledFilters' => $enabledFilters,
        ]);
    }

    public function setFilters(Resource $resource)
    {
        foreach (array_keys($resource->getFilters()) as $key) {
            $this->filters[$key]['enabled'] = false;
            $this->filters[$key]['fields'] = [];
        }

        if ($filterQuery = request()->get('filterQuery')) {
            $this->filters = json_decode(base64_decode($filterQuery), true);
            $this->filterQuery = $filterQuery;
        }
    }

    public function resource()
    {
        return Rambo::resource($this->resourceName);
    }

    public function updatedSearch()
    {
        $this->page = 1;
    }

    public function updatedFilters()
    {
        $this->page = 1;
        $this->filterQuery = base64_encode(json_encode($this->filters));
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

    public function toggleFilterModal()
    {
        $this->filterModal = !$this->filterModal;
    }
}
