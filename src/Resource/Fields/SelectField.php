<?php

namespace AngryMoustache\Rambo\Resource\Fields;

class SelectField extends Field
{
    public $component = 'rambo::fields.form.select';

    public $showComponent = 'rambo::fields.show.select';

    public $options = [];

    public function resource($resource)
    {
        $this->resource = (new $resource);
        return $this;
    }

    public function getOptions()
    {
        if ($this->resource) {
            return $this->resource->model()::pluck(
                $this->resource->getDisplayName(),
                $this->resource->getPrimaryField()
            );
        }

        return $this->options;
    }
}
