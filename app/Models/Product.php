<?php

namespace App\Models;

use App\Models\AttributeProduct;
use App\Traits\HasMultiImages;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasMultiImages, Sluggable;

    protected $casts = [
        'allowed_quantities' => 'array',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * attributs = attributes : just changed it because of eloquent's own attributes
     */
    public function attributs()
    {
        return $this->belongsToMany(Attribute::class)->withPivot(['options'])->using(AttributeProduct::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function getAttributeByName(string $attributeName): Attribute
    {
        return $this->attributs->where("name", $attributeName)->first();
    }

    public function getOptionByRef(string $attributeName, string $optionRef): array
    {
        $attribute = $this->getAttributeByName($attributeName);
        return collect($attribute->pivot->options)->where("ref", $optionRef)->first();
    }

    public function scopeFilterProductsForShop($query, $search, $sort)
    {
        return $query->when($search, function ($query) use ($search) {
            return $query->where("title", "like", "%" . $search . "%");
        })
            ->when($sort && $sort !== "newest", function ($query) use ($sort) {
                if (in_array($sort, ["asc", "desc"])) {
                    return $query->orderBy("title", $sort);
                } elseif ($sort === "popular") {
                    return $query->wherePopular(1);
                }
            }, function ($query) {
                return $query->latest();
            })
            ->paginate(20)
            ->withQueryString();
    }
}
