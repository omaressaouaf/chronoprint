<?php

namespace App\View\Components\Products;

use App\Models\Product;
use Illuminate\View\Component;

class Popular extends Component
{
    public function render()
    {
        return view('components.products.popular', [
            "products" => Product::wherePopular(1)->get()
        ]);
    }
}
