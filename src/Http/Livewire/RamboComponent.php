<?php

namespace AngryMoustache\Rambo\Http\Livewire;

use Livewire\Component;

class RamboComponent extends Component
{
    public function toast($message, $type = 'ok')
    {
        $this->dispatchBrowserEvent('rambo-toast', [
            'message' => $message,
            'type' => $type,
            'show' => true,
        ]);
    }
}
