<?php

use AngryMoustache\Rambo\Rambo\Administrator;
use AngryMoustache\Rambo\Rambo\Attachment;
use AngryMoustache\Rambo\Rambo\StaticString;

return [
    'resources' => [
        Administrator::class,
        Attachment::class,
        StaticString::class,
    ],
    'icons' => [
        'administrators' => '<i class="fas fa-users"></i>',
        'attachments' => '<i class="fas fa-images"></i>',
        'static-strings' => '<i class="fas fa-font"></i>',
    ],
    'admin-route' => 'admin',
];
