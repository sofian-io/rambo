<?php

namespace AngryMoustache\Rambo\Resource\Traits;

use AngryMoustache\Rambo\Resource\Actions\DeleteAction;
use AngryMoustache\Rambo\Resource\Actions\EditAction;
use AngryMoustache\Rambo\Resource\Actions\ShowAction;
use AngryMoustache\Rambo\Resource\IndexActions\CreateAction;
use AngryMoustache\Rambo\Resource\IndexActions\OverviewAction;

trait Actions
{
    public function indexActions()
    {
        return [
            OverviewAction::class,
            CreateAction::class,
        ];
    }

    public function createActions()
    {
        return $this->indexActions();
    }

    public function actions()
    {
        return [
            ShowAction::class,
            EditAction::class,
            DeleteAction::class,
        ];
    }

    public function showActions()
    {
        return $this->actions();
    }

    public function editActions()
    {
        return $this->actions();
    }

    public function deleteActions()
    {
        return $this->actions();
    }
}
