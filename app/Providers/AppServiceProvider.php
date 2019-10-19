<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Relation::morphMap([
            'posts' => 'App\Post',
            'categories' => 'App\Category',
        ]);
    }
}
