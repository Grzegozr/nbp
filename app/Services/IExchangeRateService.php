<?php

namespace App\Services;

use Illuminate\Support\Collection;

interface IExchangeRateService
{
    public function getAllExchangeRates() : Collection;

    public function getExchangeRate($code): Collection;
}
