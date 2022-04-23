<?php

namespace App\View\Components\Products;

use App\Models\Product;
use Illuminate\View\Component;

class Latest extends Component
{
    public function render()
    {
        return view('components.products.latest', [
            "products" => Product::active()->latest()->take(8)->get()
        ]);
    }
}
