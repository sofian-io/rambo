<?php

namespace AngryMoustache\Rambo\Resource\Fields;

class HabtmField extends Field
{
    public $component = 'rambo::fields.form.habtm';

    public $showComponent = 'rambo::fields.show.habtm';

    public $hasManyRelation = true;

    public function getValue()
    {
        return (parent::getValue() ?? collect())->pluck('id');
    }

    public function getViewValue()
    {
        return parent::getValue();
    }

    public function getDisplayNameResource()
    {
        return (new $this->resource)->displayName();
    }

    public function getShowRouteItem($item)
    {
        return route('rambo.crud.show', [
            'resource' => (new $this->resource)->routebase(),
            'id' => $item->id,
        ]);
    }
}
