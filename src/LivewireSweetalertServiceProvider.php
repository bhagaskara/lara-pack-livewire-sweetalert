<?php

namespace LaraPack\LivewireSweetalert;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireSweetalertServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot()
    {
        Livewire::provideJs([
            'script' => __DIR__ . '/../resources/js/livewire-events.js',
        ]);
    }
}
