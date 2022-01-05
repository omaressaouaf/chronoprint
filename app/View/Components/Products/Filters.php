<?php

namespace App\View\Components\Products;

use Illuminate\View\Component;

class Filters extends Component
{
    public $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function render()
    {
        return view('components.products.filters', [
            "sortings" => [
                "newest" => "Newest",
                "popular" => "Popular",
                "desc" => "A à Z",
                "asc" => "Z à A"
            ]
        ]);
    }
}
