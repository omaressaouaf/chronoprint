<?php

namespace App\View\Components\Products;

use App\Models\Category;
use Illuminate\View\Component;

class Popular extends Component
{
    public function render()
    {
        return view('components.products.popular', [
            "categories" => Category::wherePopular(1)
                ->whereRelation("products", "active", true)
                ->whereRelation("products", "popular", true)
                ->with(["products" => fn ($query) => $query->active()->wherePopular(1)])
                ->get()
        ]);
    }
}
