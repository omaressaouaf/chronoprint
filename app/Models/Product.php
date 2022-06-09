<?php

namespace App\Models;

use App\Models\AttributeProduct;
use App\Traits\HasActiveField;
use App\Traits\HasVoyagerMultiImages;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, HasVoyagerMultiImages, Sluggable, HasActiveField;

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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAverageRatingAttribute()
    {
        $count = $this->reviews->where("active", 1)->count();
        if (empty($count))  return 0;

        $sum = $this->reviews->where("active", 1)->sum('rating');
        return round($sum / $count, 2);
    }

    public function getAttributeByName(string $attributeName): Attribute
    {
        return $this->attributs->where("name", $attributeName)->first();
    }

    public function getOptionByRef(string $attributeName, string $optionRef): array|null
    {
        $attribute = $this->getAttributeByName($attributeName);
        return collect($attribute->pivot->options)->where("ref", $optionRef)->first();
    }

    public function getOptionByInterval(string $attributeName, int $optionInterval): array|null
    {
        $attribute = $this->getAttributeByName($attributeName);
        return collect($attribute->pivot->options)
            ->where("minValue", "<=", $optionInterval)
            ->where("maxValue", ">=", $optionInterval)
            ->first();
    }

    public function getOptionBySelectedOptionData(string $attributeName, array $selectedOptionData): array|null
    {
        $attribute = $this->getAttributeByName($attributeName);

        if ($attribute->options_type === "fixed") {
            return $this->getOptionByRef($attributeName, $selectedOptionData['ref']);
        }

        $interval = 1;

        if (is_array($attribute->groups) && count($attribute->groups)) {
            foreach ($selectedOptionData["value"] as $selectedValue) {
                if (!is_numeric($selectedValue) || empty($selectedValue)) return null;

                $interval *= $selectedValue;
            }
        } else {
            $interval = $selectedOptionData["value"];
        }

        return $this->getOptionByInterval($attributeName, $interval);
    }

    public function scopeFilterProductsForShop($query, $search, $sort)
    {
        return $query->active()->when($search, function ($query) use ($search) {
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

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    public static function booted(): void
    {
        static::deleting(function ($product) {
            foreach ($product->cartItems as $cartItem) {
                $cartItem->delete();
            }

            if (is_array(json_decode($product->images))) {
                foreach (json_decode($product->images) as $image) {
                    Storage::disk("public")->delete($image);
                }
            }
        });
    }
}
