<?php

namespace AngryMoustache\Rambo;

use AngryMoustache\Rambo\Http\Livewire\AttachmentPicker;
use AngryMoustache\Rambo\Http\Livewire\FormController;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class RamboServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->config();
        $this->views();
        $this->routes();

        Livewire::component('rambo-attachment-picker', AttachmentPicker::class);
        Livewire::component('rambo-form', FormController::class);
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

    private function routes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
