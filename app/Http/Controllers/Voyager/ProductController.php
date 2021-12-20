<?php

namespace App\Http\Controllers\Voyager;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function syncAttributes(Request $request, Product $product)
    {
        $this->authorize('edit', $product);

        $request->validate([
            "selectedAttributes" => "nullable|array",
            "selectedAttributes.*.id" => "required",
            "selectedAttributes.*.pivot.options" => "required|array",
            "selectedAttributes.*.pivot.options.*.name" => "required|string",
            "selectedAttributes.*.pivot.options.*.price" => "required|numeric"
        ]);

        $product->attributes()->detach();

        foreach ($request->selectedAttributes as $attribute) {
            $optionsWithRef = [];

            foreach ($attribute["pivot"]["options"] as $option) {
                $optionsWithRef[] =  array_merge(
                    $option,
                    isset($option["ref"])
                        ? []
                        : ['ref' => Str::uuid() . Str::random(10)]
                );
            }

            $attribute["pivot"]["options"] = $optionsWithRef;

            $product->attributes()->attach($attribute['id'], ["options" => $attribute["pivot"]["options"]]);
        }

        return response()->json(["selectedAttributes" => $product->attributes], 201);
    }
}
