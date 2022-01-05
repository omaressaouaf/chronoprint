<?php

namespace App\Traits;

trait HasMultiImages
{
    /**
     * Get the first image path in an array of images prefixed with storage
     *
     * @return string
     */
    public function getFirstImageAttribute(): string
    {
        return $this->images  ? "\\storage\\" . json_decode($this->images)[0] : "/storage/products/placeholder.jpg";
    }

    /**
     * Get the all images paths prefixed with storage/
     *
     * @return array
     */
    public function getAllImagesAttribute(): array
    {
        if (!$this->images) return  ["/storage/products/placeholder.jpg"];

        $images = [];

        foreach (json_decode($this->images) as $image) {
            $images[] = "\\storage\\" . $image;
        }

        return $images;
    }
}
