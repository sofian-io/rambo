<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use Livewire\Component;

class HabtmPicker extends Component
{
    public $name;
    public $targetResource;
    public $targetModel;
    public $items;
    public $search = '';
    public $searchFields = [];
    public $selecting = false;
    public $habtmComponent = 'rambo::habtm.item';
    public $selections = [];

    public function mount($field)
    {
        $this->name = $field->getName();
        $this->targetResource = $field->targetResource;
        $this->targetModel = $field->targetResource::$model;
        $this->habtmComponent = $field->targetResource::$habtmComponent;
        $this->searchFields = $field->targetResource::$searchFields;
        $this->items = $this->targetModel::orderBy('id', 'desc')->get();

        $this->selections = optional($field->getValue())
            ->mapWithKeys(fn ($value) => [$value->id => true]);

        $this->selections = optional($this->selections)->toArray() ?? [];
    }

    public function render()
    {
        $this->items = $this->targetModel::orderBy('id', 'desc');
        foreach ($this->searchFields as $field) {
            $this->items = $this->items->where($field, 'LIKE', "%{$this->search}%");
        }

        $this->items = $this->items->get();

        $this->emit(
            'field:update',
            collect($this->selections)
                ->filter()
                ->map(fn ($value, $key) => $key)
                ->toArray(),
            $this->name
        );

        return view('rambo::livewire.habtm-picker');
    }

    public function openModal()
    {
        $this->selecting = true;
    }

    public function closeModal()
    {
        $this->selecting = false;
    }
}
