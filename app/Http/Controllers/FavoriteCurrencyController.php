<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteRequest;
use App\Models\FavoriteCurrency;
use App\Repositories\Currency\ICurrencyRepo;
use App\Repositories\FavoriteCurrency\IFavoriteCurrencyRepo;
use App\Services\IExchangeRateService;
use Illuminate\Support\Facades\Log;

class FavoriteCurrencyController extends Controller
{
    public function __construct(
        private readonly ICurrencyRepo $currencyRepo,
        private readonly IFavoriteCurrencyRepo $favoriteCurrencyRepo,
        private readonly IExchangeRateService $exchangeRateService
    )
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoriteRequest $request)
    {
        try {
            $attributes = $request->validated();

            $currency = $this->currencyRepo->find($attributes['currency_id']);
            $rate = $this->exchangeRateService->getExchangeRate($currency->code);

            $attributes['rate'] = $rate['mid'];
            $this->favoriteCurrencyRepo->create($attributes);
            session()->flash('success', 'Pomyślnie dodano do ulubionych');
        } catch (\Exception $e) {
            session()->flash('error', 'Wystąpił błąd podczas zapisu');
            Log::error($e->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FavoriteCurrency $favoriteCurrency)
    {
        try {
            $this->favoriteCurrencyRepo->delete($favoriteCurrency);
            session()->flash('success', 'Usunięto pomyślnie');
        } catch (\Exception $e) {
            session()->flash('error', 'Wystąpił błąd podczas usuwania');
            Log::error($e->getMessage());
        }
        return redirect()->back();
    }
}
