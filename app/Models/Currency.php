<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'code', 'name'
    ];

    public function getNameAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }
}
