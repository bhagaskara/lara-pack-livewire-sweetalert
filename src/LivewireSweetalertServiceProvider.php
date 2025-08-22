<?php

namespace LaraPack\LivewireSweetalert;

use Illuminate\Support\ServiceProvider;
use LaraPack\LivewireSweetalert\Http\Middleware\InjectScript;

class LivewireSweetalertServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->booted(function () {
            $this->app['router']->pushMiddlewareToGroup('web', InjectScript::class);
        });
    }
}
