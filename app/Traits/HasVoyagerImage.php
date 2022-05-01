<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasVoyagerImage
{
    /**
     * Get the image public path
     *
     * @return string
     */
    public function getPublicImageAttribute(): string
    {
        return $this->image ? "/storage/" . Str::replace('\\', '/', $this->image) : "/storage/products/default.jpg";
    }
}
