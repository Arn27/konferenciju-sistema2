<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Define event listeners here if needed
    ];

    public function boot()
    {
        parent::boot();
        // Additional event handling logic if needed
    }
}
