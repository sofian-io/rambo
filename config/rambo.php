<?php

use AngryMoustache\Rambo\Rambo\Administrator;
use AngryMoustache\Rambo\Rambo\Attachment;

return [
    'resources' => [
        Administrator::class,
        Attachment::class,
    ],
    'icons' => [
        'administrators' => '<i class="fas fa-users"></i>',
        'attachments' => '<i class="fas fa-images"></i>'
    ],
];
