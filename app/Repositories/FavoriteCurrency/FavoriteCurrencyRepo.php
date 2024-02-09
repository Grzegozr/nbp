<?php

namespace App\Repositories\FavoriteCurrency;

use App\Models\FavoriteCurrency;
use App\Repositories\Crud\CrudRepo;

class FavoriteCurrencyRepo extends CrudRepo implements IFavoriteCurrencyRepo
{
    public function __construct(FavoriteCurrency $model)
    {
        parent::__construct($model);
    }
}
