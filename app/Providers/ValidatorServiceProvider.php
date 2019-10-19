<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        $this->byAuthor();
    }

    public function byAuthor() {
        $this->app['validator']->extend('by_author', function ($attribute, $value, $parameters)
        {
            $reg = '#^[A-Z][a-z]+ [A-Z][a-z]+$#';
            return preg_match($reg, $value);
        });
    }
}
