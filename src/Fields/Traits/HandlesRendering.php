<?php

namespace AngryMoustache\Rambo\Fields\Traits;

trait HandlesRendering
{
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
        return view($this->component, [
            'field' => $this
        ]);
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
