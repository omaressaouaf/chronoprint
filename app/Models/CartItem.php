<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class CartItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "selected_options" => AsCollection::class
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, "model");
    }
}
