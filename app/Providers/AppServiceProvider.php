<?php

namespace App\Providers;

use Encore\Admin\Config\Config;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') === 'local') {
            \Illuminate\Support\Facades\URL::forceScheme('http');
        }
        $table = config('admin.extensions.config.table', 'admin_config');
        if (Schema::hasTable($table)) {
            Config::load();
        }
        view()->composer('layout', function ($view) {
            $theme = \Cookie::get('theme');
            if ($theme != 'dark' && $theme != 'light') {
                $theme = 'light';
            }

            $view->with('theme', $theme);
        });
        view()->composer('home', function ($view) {
            $theme = \Cookie::get('theme');
            if ($theme != 'dark' && $theme != 'light') {
                $theme = 'light';
            }

            $view->with('theme', $theme);
        });
    }
}
