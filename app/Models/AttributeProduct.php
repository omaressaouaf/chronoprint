<?php

namespace App\Models;

use App\Casts\AttributeProductOptionsJson;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeProduct extends Pivot
{
    use HasFactory;

    protected $casts = [
        "options" => AttributeProductOptionsJson::class,
    ];
}
