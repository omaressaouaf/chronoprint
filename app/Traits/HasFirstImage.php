<?php

namespace App\Traits;

trait HasFirstImage
{
    public function getFirstImageAttribute()
    {
        return $this->images  ? "\\storage\\" . $this->images[0] : "/storage/products/placeholder.jpg";
    }
}
