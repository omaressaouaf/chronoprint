<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        if ($slug === "all") {
            $category = (object) [
                "name" => __("All products"),
                "slug" => "all"
            ];
            $products = Product::query();
        } else {
            $category = Category::whereSlug($slug)->firstOrFail();
            $products = $category->products();
        }

        $products = $products->filterProductsForShop(request("search"), request("sort"));

        return view("categories.show", compact("category", "products"));
    }
}
