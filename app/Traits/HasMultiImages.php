<?php

namespace App\Traits;

trait HasMultiImages
{
    public function getFirstImageAttribute()
    {
        return $this->images  ? "\\storage\\" . json_decode($this->images)[0] : "/storage/products/placeholder.jpg";
    }

    public function getAllImagesAttribute()
    {
        if (!$this->images) return  ["/storage/products/placeholder.jpg"];

        $images = [];

        foreach (json_decode($this->images) as $image) {
            $images[] = "\\storage\\" . $image;
        }

        return $images;
    }
}
