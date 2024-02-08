<?php

namespace App\Console\Commands;

use App\Repositories\Currency\ICurrencyRepo;
use App\Services\IExchangeRateService;
use Illuminate\Console\Command;

class UpdateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(IExchangeRateService $exchangeRateService, ICurrencyRepo $currencyRepo)
    {
        $currencies = $exchangeRateService->getAllExchangeRates();

        foreach ($currencies as $currency)
        {
            $currencyRepo->updateOrCreate($currency->code, ['name' => $currency->currency]);
        }
    }
}
