<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteCurrency extends Model
{
    protected $fillable = ['rate','currency_id'];

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
