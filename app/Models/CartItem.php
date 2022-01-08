<?php

namespace App\Models;

use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory, HasMedia;

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

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}