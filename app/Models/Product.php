<?php

namespace App\Models;

use App\Models\AttributeProduct;
use App\Traits\HasFirstImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory , HasFirstImage;

    protected $casts = [
        'allowed_quantities' => 'array',
        "images" => "array"
    ];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot(['options'])->using(AttributeProduct::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilterProductsForShop($query, $search, $sort)
    {
        return $query->when($search, function ($query) use ($search) {
            return $query->where("title", "like", "%" . $search . "%");
        })
            ->when($sort, function ($query) use ($sort) {
                if (in_array($sort, ["asc", "desc"])) {
                    return $query->orderBy("title", $sort);
                } elseif ($sort === "popular") {
                    return $query->wherePopular(1);
                }
                return $query->latest();
            })
            ->paginate(20)
            ->withQueryString();
    }
}
