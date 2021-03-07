<?php

namespace AngryMoustache\Rambo\Fields;

class BelongsToField extends SelectField
{
    /**
     * The fields blade component
     * @var string
     */
    public $showComponent = 'rambo::fields.show.belongs-to';

    /**
     * The fields target resource
     * @var string
     */
    public $resource;

    public function resource($resource)
    {
        $this->resource = $resource;
        $this->options = $resource::getModel()::pluck($resource::getNameField() ?? 'id', 'id');
        return $this;
    }
}
