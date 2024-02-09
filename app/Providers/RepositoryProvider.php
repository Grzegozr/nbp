<?php

namespace App\Providers;

use App\Repositories\Crud\CrudRepo;
use App\Repositories\Crud\ICrudRepo;
use App\Repositories\Currency\CurrencyRepo;
use App\Repositories\Currency\ICurrencyRepo;
use App\Repositories\FavoriteCurrency\FavoriteCurrencyRepo;
use App\Repositories\FavoriteCurrency\IFavoriteCurrencyRepo;
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
        $this->app->bind(IFavoriteCurrencyRepo::class, FavoriteCurrencyRepo::class);
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
