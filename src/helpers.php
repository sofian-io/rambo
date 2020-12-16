<?php

use AngryMoustache\Rambo\Models\StaticString;
use Illuminate\Support\Str;

if (! function_exists('__s')) {
    function __s($name) {
        $scope = Str::before($name, '.');
        $key = Str::after($name, '.');
        $string = StaticString::firstOrCreate([
            'scope' => $scope,
            'key' => $key,
        ], ['value' => $name]);

        return optional($string)->value ?? $name;
    }
}
