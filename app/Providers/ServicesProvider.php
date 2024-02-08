<?php

namespace App\Providers;

use App\Services\IExchangeRateService;
use App\Services\NbpApi\NbpExchangeRateService;
use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IExchangeRateService::class, NbpExchangeRateService::class);
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
}
