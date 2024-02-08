<?php

namespace App\Http\Controllers;

use App\Repositories\Currency\ICurrencyRepo;

class NbpController extends Controller
{
    public function __construct(
        private readonly ICurrencyRepo $currencyRepo
    )
    {
    }

    public function index()
    {
        $currencies = $this->currencyRepo->all(['order_by' => 'name', 'order_by_direction' => 'asc']);

        return view('welcome')
            ->with('currencies', $currencies);
    }
}
