<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use App\Models\Inquiry;
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

    public function mount()
    {
        $this->validation = (new $this->form)->getValidationRules();
    }

    public function render()
    {
        $form = (new $this->form);
        $this->formFields = $form->getFullFieldStack();

        return view($this->blade);
    }

    public function updated($field, $value)
    {
        $this->validateOnly($field, $this->validation);
    }

    public function submit()
    {
        dd(Inquiry::create($this->fields));
    }
}
