<?php

namespace AngryMoustache\Rambo;

use Illuminate\Support\ServiceProvider;

class RamboServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->config();
        $this->views();
    }

    private function config()
    {
        $configPath = __DIR__ . '/../config/rambo.php';
        $this->publishes([$configPath => config_path('rambo.php')]);
        $this->mergeConfigFrom($configPath, 'rambo');
    }

    private function views()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rambo');
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/rambo')
        ]);
    }
}
