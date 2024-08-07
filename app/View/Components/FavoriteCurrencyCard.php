<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FavoriteCurrencyCard extends Component
{
    public $letter;
    /**
     * Create a new component instance.
     */
    public function __construct(public $code, public $rate, public $name, public $id, public $table)
    {
        $this->rate = rtrim($this->rate, '0');
        $this->rate = rtrim($this->rate, '.');
        $this->letter = strtoupper(substr($code, 0, 1));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.favorite-currency-card');
    }
}
