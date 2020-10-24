<?php

namespace AngryMoustache\Rambo;

use Illuminate\Support\ServiceProvider;

class RamboServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->config();
    }

    private function config()
    {
        $configPath = __DIR__ . '/../config/rambo.php';
        $this->publishes([$configPath => config_path('rambo.php')]);
        $this->mergeConfigFrom($configPath, 'rambo');
    }
}
