<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\CheckPasswordController;
use App\Interfaces\PasswordValidationInterface;
use App\Services\PasswordValidation;

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
        PasswordValidationInterface::class => PasswordValidation::class,
    ];
}
