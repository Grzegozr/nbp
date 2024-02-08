<?php

namespace App\Providers;

use App\Repositories\Crud\CrudRepo;
use App\Repositories\Crud\ICrudRepo;
use App\Repositories\Currency\CurrencyRepo;
use App\Repositories\Currency\ICurrencyRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICrudRepo::class, CrudRepo::class);
        $this->app->bind(ICurrencyRepo::class, CurrencyRepo::class);
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
