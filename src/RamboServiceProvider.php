<?php

namespace AngryMoustache\Rambo;

use AngryMoustache\Rambo\Facades\Rambo as FacadeRambo;
use AngryMoustache\Rambo\Http\Livewire\Auth\Login;
use AngryMoustache\Rambo\Http\Livewire\Crud\IndexTable;
use AngryMoustache\Rambo\Http\Livewire\Crud\ResourceCreate;
use AngryMoustache\Rambo\Http\Livewire\Crud\ResourceDelete;
use AngryMoustache\Rambo\Http\Livewire\Crud\ResourceEdit;
use AngryMoustache\Rambo\Http\Livewire\Crud\ResourceShow;
use AngryMoustache\Rambo\Http\Livewire\Fields\AttachmentPicker;
use AngryMoustache\Rambo\Http\Livewire\Fields\HabtmPicker;
use AngryMoustache\Rambo\Http\Livewire\Fields\LinkPicker;
use AngryMoustache\Rambo\Http\Livewire\Fields\ManyAttachmentPicker;
use AngryMoustache\Rambo\Http\Livewire\Fields\PasswordInput;
use AngryMoustache\Rambo\Http\Livewire\Fields\YoutubeLink;
use AngryMoustache\Rambo\Rambo;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class RamboServiceProvider extends ServiceProvider
{
    public $singletons = [
        Rambo::class => Rambo::class
    ];

    public function boot()
    {
        $this->config();
        $this->views();
        $this->routes();
        $this->migrations();
        $this->publishing();
        $this->livewire();

        Route::bind('resource', function ($value) {
            return FacadeRambo::resource($value);
        });
    }

    public function register()
    {
        $this->app->booting(function() {
            $loader = AliasLoader::getInstance();
            $loader->alias('Rambo', FacadeRambo::class);
        });

        $this->app->alias(Rambo::class, 'rambo');
    }

    private function livewire()
    {
        /** AUTH */
        Livewire::component('rambo-auth-login', Login::class);

        /** CRUD */
        Livewire::component('rambo-crud-index-table', IndexTable::class);
        Livewire::component('rambo-crud-resource-create', ResourceCreate::class);
        Livewire::component('rambo-crud-resource-delete', ResourceDelete::class);
        Livewire::component('rambo-crud-resource-edit', ResourceEdit::class);
        Livewire::component('rambo-crud-resource-show', ResourceShow::class);

        /** FIELDS */
        Livewire::component('rambo-fields-attachment-picker', AttachmentPicker::class);
        Livewire::component('rambo-fields-habtm-picker', HabtmPicker::class);
        Livewire::component('rambo-fields-link-picker', LinkPicker::class);
        Livewire::component('rambo-fields-many-attachment-picker', ManyAttachmentPicker::class);
        Livewire::component('rambo-fields-password-input', PasswordInput::class);
        Livewire::component('rambo-fields-youtube-link', YoutubeLink::class);

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

    private function publishing()
    {
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
    }
}
