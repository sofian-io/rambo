<?php

namespace AngryMoustache\Rambo\Seeders;

use AngryMoustache\Rambo\Facades\Rambo;
use AngryMoustache\Rambo\Models\Administrator;
use Illuminate\Database\Seeder;

class RamboSeeder extends Seeder
{
    public static function run()
    {
        Administrator::create([
            'username' => 'admin',
            'email' => 'test',
            'password' => Rambo::passwordHash('test')
        ]);
    }
}
