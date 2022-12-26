<?php

namespace App\Providers;

use Backpack\PermissionManager\app\Http\Controllers\UserCrudController;
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

        $this->app->bind(
            UserCrudController::class,
            \App\Http\Controllers\Admin\UserCrudController::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
