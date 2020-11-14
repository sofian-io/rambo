<?php

namespace AngryMoustache\Rambo\Http\Livewire;

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
            $form->getFullFieldStack()->each(function ($field) {
                $this->fields[$field->getName()] = $this->item[$field->getName()];
            });
        }
    }

    public function render()
    {
        $form = (new $this->form);
        $this->formFields = $form->getFullFieldStack();

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

        if ($this->updating !== false) {
            $item = $this->form::$model::find($this->updating);
            $item->update($this->fields);
        } else {
            $this->form::$model::create($this->fields);
        }

        return redirect("/admin/{$this->form::$routeBase}/{$this->updating}");
    }
}
