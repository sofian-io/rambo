<?php

namespace AngryMoustache\Rambo;

use AngryMoustache\Rambo\Http\Livewire\AttachmentPicker;
use AngryMoustache\Rambo\Http\Livewire\ColorPicker;
use AngryMoustache\Rambo\Http\Livewire\FormController;
use AngryMoustache\Rambo\Http\Livewire\HabtmPicker;
use AngryMoustache\Rambo\Http\Livewire\Login;
use AngryMoustache\Rambo\Http\Livewire\MassUpload;
use AngryMoustache\Rambo\Http\Livewire\YoutubeField;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class RamboServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->config();
        $this->views();
        $this->routes();
        $this->migrations();

        $this->publishes([
            __DIR__ . '/../config/rambo.php' => config_path('rambo.php'),
        ], 'rambo-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/rambo'),
        ], 'rambo-views');

        $this->publishes([
            __DIR__ . '/../public/css' => public_path('vendor/rambo/css'),
            __DIR__ . '/../public/js' => public_path('vendor/rambo/js'),
        ], 'rambo-required-assets');

        Livewire::component('rambo-attachment-picker', AttachmentPicker::class);
        Livewire::component('rambo-color-picker', ColorPicker::class);
        Livewire::component('rambo-form', FormController::class);
        Livewire::component('rambo-habtm-picker', HabtmPicker::class);
        Livewire::component('rambo-login', Login::class);
        Livewire::component('rambo-mass-upload', MassUpload::class);
        Livewire::component('rambo-youtube-field', YoutubeField::class);
    }

    public function register()
    {
        $this->app->booting(function() {
            $loader = AliasLoader::getInstance();
            $loader->alias('RamboAuth', RamboAuth::class);
        });
    }

    private function config()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rambo.php', 'rambo');
    }

    private function views()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rambo');
    }

    private function routes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    private function migrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
