<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product->load(["category", "attributs"]);

        return view("products.show", compact("product"));
    }
}
