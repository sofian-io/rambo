<?php

namespace AngryMoustache\Rambo\Resource\Traits;

trait Queries
{
    public $item;

    public function indexQuery()
    {
        return $this->model()::withoutGlobalScopes();
    }

    public function item($id)
    {
        $this->item = $this->model()::withoutGlobalScopes()->find($id);
        return $this;
    }
}
