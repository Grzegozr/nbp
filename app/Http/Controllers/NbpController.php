<?php

namespace App\Http\Controllers;

use App\Repositories\Currency\ICurrencyRepo;
use App\Repositories\FavoriteCurrency\IFavoriteCurrencyRepo;

class NbpController extends Controller
{
    public function __construct(
        private readonly ICurrencyRepo $currencyRepo,
        private readonly IFavoriteCurrencyRepo $favoriteCurrencyRepo
    )
    {
    }

    public function index()
    {
        $currencies = $this->currencyRepo->all(['order_by' => 'name', 'order_by_direction' => 'asc']);
        $favoriteCurrencies = $this->favoriteCurrencyRepo->all();

        return view('welcome')
            ->with('currencies', $currencies)
            ->with('favoriteCurrencies', $favoriteCurrencies);
    }
}
