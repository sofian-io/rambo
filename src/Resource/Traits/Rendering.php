<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Rendering
{
    public $indexTableView = 'rambo::components.crud.tables.index';

    public $habtmComponent = 'rambo::components.habtm.item';

    public function indexTableView()
    {
        return $this->indexTableView;
    }

    public function habtmComponent()
    {
        return $this->habtmComponent;
    }
}
