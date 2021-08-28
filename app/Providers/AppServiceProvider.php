<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PasswordValidation;
use App\Services\Base\Password;

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
        //
    }

     public $singletons = [
        Password::class=> PasswordValidation::class
     ];
}
