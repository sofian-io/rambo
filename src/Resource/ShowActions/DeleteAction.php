<?php

namespace AngryMoustache\Rambo\Resource\ShowActions;

use AngryMoustache\Rambo\Resource\Actions\LivewireAction;

class DeleteAction extends LivewireAction
{
    public $icon = 'far fa-trash-alt';

    public $label = 'Delete';

    public function getLivewireAction()
    {
        if ($this->getCurrentUrl() !== $this->resource->index()) {
            return null;
        }

        return 'openDeleteModal(' . $this->item->id . ')';
    }

    public function getLink()
    {
        return $this->resource->delete($this->item->id);
    }
}
