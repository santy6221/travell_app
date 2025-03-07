<?php

namespace App\Providers;

use App\Services\ExchangeService;
use Illuminate\Support\ServiceProvider;

class ExchangeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ExchangeService::class, function ($app) {
            return new ExchangeService();
        });
    }

    public function boot()
    {
        //
    }
}