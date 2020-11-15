<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use AngryMoustache\Rambo\Fields\HabtmField;
use Livewire\Component;

class FormController extends Component
{
    /**
     * The form class with the fields
     * @var Form
     */
    public $form = null;

    /**
     * The extracted form fields
     * @var Collection
     */
    public $formFields = null;

    /**
     * The fields data that has been inputted
     * @var array
     */
    public $fields = [];
    public $item = null; // Fill data when in edit view

    /**
     * The blade component to render
     * @var string
     */
    public $blade = 'rambo::form';

    /**
     * Edit or create page
     * @var string
     */
    public $page;

    /**
     * The validation rules of the form
     * @var array
     */
    public $validation = [];

    /**
     * Rambo field listeners
     * @var array
     */
    protected $listeners = [
        'field:update' => 'updateField',
    ];

    /**
     * Are we creating or updating?
     * @var boolean
     */
    public $updating = false;

    public function mount()
    {
        $this->validation = (new $this->form)->getValidationRules();

        if ($this->item) {
            $form = (new $this->form);
            $form->getFullFieldStack($this->page)->each(function ($field) {
                $value = $field->item($this->item)->getValue();
                $this->fields[$field->getName()] = $value;
            });
        }
    }

    public function render()
    {
        $form = (new $this->form);
        $this->formFields = $form->getFullFieldStack($this->page);

        return view($this->blade);
    }

    public function updated($field, $value)
    {
        if ($this->validation !== []) {
            $this->validateOnly($field, $this->validation);
        }
    }

    public function updateField($value, $fieldName)
    {
        $this->fields[$fieldName] = $value;
    }

    public function submit()
    {
        if ($this->validation !== []) {
            $this->validate($this->validation);
        }

        $relations = [];
        (new $this->form)->getOnlyFieldsStack($this->page)->each(function ($field) use (&$relations) {
            $field = $field->item($this->fields);
            $parsed = $field->getParsedValue();
            $name = $field->getName();

            if ($parsed === '__unset__') {
                unset($this->fields[$name]);
            } else {
                $this->fields[$name] = $parsed;
            }

            if (get_class($field) === HabtmField::class) {
                $relations[$name] = $this->fields[$name];
            }
        });

        if ($this->updating !== false) {
            $item = $this->form::$model::find($this->updating);
            $item->update($this->fields);
            $item = $this->form::$model::find($this->updating);
        } else {
            $item = $this->form::$model::create($this->fields);
        }

        foreach ($relations as $relation => $values) {
            $item->{$relation}()->sync($values);
        }

        return redirect("/admin/{$this->form::$routeBase}/{$this->updating}");
    }
}
