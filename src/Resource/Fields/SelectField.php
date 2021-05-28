<?php

namespace AngryMoustache\Rambo\Resource\Fields;

use App\Enums\PullOriginEnum;

class SelectField extends Field
{
    public $component = 'rambo::fields.form.select';

    public $showComponent = 'rambo::fields.show.select';

    public $options = [];

    public $notNullable = false;

    public function resource($resource)
    {
        $this->resource = (new $resource);
        return $this;
    }

    public function getOptions()
    {
        if ($this->resource) {
            return $this->resource->relationQuery()->pluck(
                $this->resource->getDisplayName(),
                $this->resource->getPrimaryField()
            );
        }

        return $this->options;
    }

    public function getShowValue()
    {
        if ($this->resource) {
            return $this->getValue();
        }

        return $this->getOptions()[$this->getValue()] ?? null;
    }
}
