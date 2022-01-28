<?php

namespace App\Models;

use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory, HasMedia, Prunable;

    protected $guarded = [];

    protected $casts = [
        "selected_options" => AsCollection::class
    ];

    /**
     * Return the root folder for all media files of the model
     *
     * @return string
     */
    public function mediaRootFolderPath(): string
    {
        return "cartItems/" . $this->id;
    }

    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        return static::where('created_at', '<=', now()->subMinute());
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
