<?php

namespace App\Repositories\Currency;

use App\Repositories\Crud\ICrudRepo;

interface ICurrencyRepo extends ICrudRepo
{
    public function updateOrCreate(string $code, array $attributes);
}
