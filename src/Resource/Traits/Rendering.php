<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Rendering
{
    public $indexView = 'rambo::crud.index';
    public $createView = 'rambo::crud.create';
    public $showView = 'rambo::crud.show';
    public $editView = 'rambo::crud.edit';
    public $deleteView = 'rambo::crud.delete';

    public $indexTableView = 'rambo::components.crud.tables.index';
    public $habtmComponent = 'rambo::components.habtm.item';

    public function indexView()
    {
        return $this->indexView;
    }

    public function createView()
    {
        return $this->createView;
    }

    public function showView()
    {
        return $this->showView;
    }

    public function editView()
    {
        return $this->editView;
    }

    public function deleteView()
    {
        return $this->deleteView;
    }

    public function indexTableView()
    {
        return $this->indexTableView;
    }

    public function habtmComponent()
    {
        return $this->habtmComponent;
    }
}
