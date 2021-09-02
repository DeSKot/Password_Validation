<?php

namespace App\Providers\PasswordValidation;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PasswordValidationInterface;
use App\Services\PasswordValidator;

class PasswordValidatorProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public $singletons = [
        PasswordValidationInterface::class => PasswordValidator::class,
    ];
}
