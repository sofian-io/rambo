<?php

namespace AngryMoustache\Rambo\Fields\Traits;

trait HandlesRendering
{
    /**
     * The fields blade component
     * @var string
     */
    public $component;

    /**
     * The CRUD page that is being viewed
     * @var string
     */
    public $page;

    /**
     * The CRUD pages the item is hidden from
     * @var array
     */
    public $hideFrom = [];

    /**
     * The fields blade component for index/show
     * @var string
     */
    public $showComponent = 'rambo::fields.show.text';

    /**
     * Default field tailwind styles
     * @var string
     */
    public $wrapperClass = 'flex w-2/3 mb-4 pb-4 border-b border-gray-100';

    public $inputWrapperClass = 'w-3/4';
    public $inputClass = 'w-full px-2 py-1 border rounded m-1';
    public $errorClass = 'w-full p-2 pt-4 text-red-500';

    public $labelWrapperClass = 'w-1/4 p-2';
    public $labelClass = 'w-full';

    /**
     * Render the field component
     * @return void
     */
    public function render()
    {
        if (! in_array($this->page, $this->hideFrom)) {
            return view($this->component, [
                'field' => $this
            ]);
        }
    }

    /**
     * Render the field component on index/show
     * @return void
     */
    public function renderShow()
    {
        if (! in_array($this->page, $this->hideFrom)) {
            return view($this->showComponent, [
                'field' => $this
            ]);
        }
    }

    /**
     * Get the current fields name
     * @return string|null
     */
    public function getName()
    {
        return $this->name ?? null;
    }

    /**
     * Get the current fields label
     * @return string|null
     */
    public function getLabel()
    {
        return $this->label ?? $this->getName();
    }
}
