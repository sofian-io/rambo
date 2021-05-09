<?php

namespace AngryMoustache\Rambo\Http\Livewire\Crud;

use AngryMoustache\Rambo\Facades\Rambo;
use Livewire\Component;

class FormController extends Component
{
    public $resourceName;

    public $rules;

    public $fields = [];

    public $pageType;

    public $currentUrl;

    protected $listeners = [
        'field:update' => 'updateField',
        'field:unset' => 'unsetField',
    ];

    public function mount($resource)
    {
        $this->currentUrl = request()->url();
        $this->resourceName = $resource->routebase;
        $this->rules = $resource->validationFieldStack();
    }

    public function render()
    {
        $resource = $this->resource();

        return view($this->component, [
            'resource' => $resource,
        ]);
    }

    public function resource()
    {
        return Rambo::resource($this->resourceName);
    }

    public function updateField($value, $fieldName)
    {
        $this->fields[$fieldName] = $value;
        $this->updated($fieldName);
    }

    public function unsetField($fieldName)
    {
        unset($this->fields[$fieldName]);
        $this->updated($fieldName);
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        $resource = $this->resource();

        if (method_exists($resource, 'sluggify')) {
            $this->fields = $resource->sluggify($this->fields);
        }

        // BeforeSave methods
        collect($resource->formFieldStack())->each(function ($field) {
            $name = $field->getName();
            if (isset($this->fields[$name])) {
                $this->fields[$name] = $field->beforeSave($this->fields[$name]);
            }
        });

        $this->saveData();
    }

    public function habtmRelations()
    {
        $relations = [];
        $fields = collect($this->resource()->formFieldStack());

        $fields->each(function ($field) use (&$relations) {
            $name = $field->getName();

            if ($field->hasManyRelation) {
                $relations[$name] = $this->fields[$name];
            }
        });

        return $relations;
    }
}
