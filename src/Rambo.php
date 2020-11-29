<?php

namespace AngryMoustache\Rambo;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Rambo
{
    public static function serving()
    {
        return (Str::startsWith(Route::current()->uri, ['admin', 'livewire']));
    }
}
