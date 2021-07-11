<?php

namespace AngryMoustache\Rambo\Http\Livewire\Fields;

use AngryMoustache\Rambo\Facades\Rambo;

class HabtmPicker extends LivewireField
{
    public $search = '';
    public $selecting = false;
    public $model;
    public $resource;
    public $displayName;
    public $itemComponent;

    public function mount($field, $emit = null, $clearOnUpdate = null)
    {
        parent::mount($field, $emit, $clearOnUpdate);

        $this->resource = (new $field->resource)->routebase();
        $resource = $this->resource();

        $this->model = $resource->model();
        $this->displayName = $resource->getDisplayName();
        $this->itemComponent = $resource->habtmComponent();
        $this->value = $this->model::withoutGlobalScopes()->whereIn('id', $this->value)->get();
    }

    public function render()
    {
        $items = collect();
        if ($this->selecting) {
            $items = $this->resource()
                ->relationQuery()
                ->when($this->search !== '', function ($query) {
                    foreach ($this->resource()->searchableFields() as $field) {
                        $query->orWhere($field, 'LIKE', "%{$this->search}%");
                    }
                })
                ->get();
        }

        $_items = ['selected' => [], 'unselected' => []];
        $_value = $this->value->pluck('id')->toArray();
        $items->each(function ($item) use (&$_items, $_value) {
            if (in_array($item->id, $_value)) {
                $_items['selected'][] = $item;
            } else {
                $_items['unselected'][] = $item;
            }
        });

        return view('rambo::livewire.fields.habtm-picker', [
            'selectedItems' => collect($_items['selected']),
            'unselectedItems' => collect($_items['unselected']),
        ]);
    }

    public function toggleItem($item)
    {
        if (in_array($item, $this->value->pluck('id')->toArray())) {
            $this->value = $this->value->reject(fn ($value) => $value->id === $item); // Remove
        } else {
            $this->value[] = $this->model::withoutGlobalScopes()->find($item); // Add
        }

        $this->emitValue($this->value->pluck('id')->toArray());
    }

    public function resource()
    {
        return Rambo::resource($this->resource);
    }

    public function openModal()
    {
        $this->selecting = true;
    }

    public function closeModal()
    {
        $this->search = '';
        $this->selecting = false;
    }
}
