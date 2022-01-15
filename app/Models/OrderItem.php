<?php

namespace App\Models;

use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
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
        return "orderItems/" . $this->id;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
