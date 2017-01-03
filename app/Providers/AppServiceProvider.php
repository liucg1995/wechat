<?php

namespace Guo\Wechat\Providers;

use App;
use Config;
use Illuminate\Support\ServiceProvider;
use Lang;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Register routes, translations, views and publishers.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->routesAreCached()) {
            require realpath(__DIR__.'/../Http/web.php');
        }

        $this->loadTranslationsFrom(realpath(__DIR__.'/../../resources/lang'), 'wechat');

        $this->loadViewsFrom(realpath(__DIR__.'/../../resources/views'), 'wechat');

//        $this->publishes([realpath(__DIR__.'/../../resources/views') => base_path('resources/views/vendor/guo/file')], 'views');

        $this->publishes([realpath(__DIR__.'/../../resources/assets') => public_path('assets')], 'admin-wechat');

        $this->publishes([realpath(__DIR__.'/../../resources/config') => config_path('')], 'admin-wechat');
        $this->publishes([realpath(__DIR__.'/../../user') => base_path('app')], 'admin-wechat');

        $this->publishes([realpath(__DIR__.'/../../database/migrations') => database_path('migrations')], 'admin-wechat');

        $this->publishes([realpath(__DIR__.'/../../database/seeds') => database_path('seeds')], 'admin-wechat');
    }
}
