<?php

namespace AngryMoustache\Rambo\Facades;

use Illuminate\Support\Facades\Facade;

class Rambo extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'rambo';
    }
}
