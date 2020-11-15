<?php

namespace AngryMoustache\Rambo\Seeders;

use AngryMoustache\Rambo\Models\Administrator;
use AngryMoustache\Rambo\RamboAuth;
use Illuminate\Database\Seeder;

class RamboSeeder extends Seeder
{
    public static function run()
    {
        Administrator::create([
            'username' => 'admin',
            'email' => 'admin@rambo.com',
            'password' => RamboAuth::hash('test')
        ]);
    }
}
