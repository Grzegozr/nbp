<?php

namespace App\Repositories\Currency;

use App\Models\Currency;
use App\Repositories\Crud\CrudRepo;

class CurrencyRepo extends CrudRepo implements ICurrencyRepo
{
    public function __construct(Currency $model)
    {
        parent::__construct($model);
    }
}
