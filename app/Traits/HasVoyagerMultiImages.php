<?php

namespace App\Traits;

trait HasVoyagerMultiImages
{
    /**
     * Get the first image path in an array of images prefixed with storage
     *
     * @return string
     */
    public function getFirstImageAttribute(): string
    {
        return $this->images  ? "\\storage\\" . json_decode($this->images)[0] : "/storage/products/default.jpg";
    }

    /**
     * Get the all images paths prefixed with storage/
     *
     * @return array
     */
    public function getAllImagesAttribute(): array
    {
        if (!$this->images) return  ["/storage/products/default.jpg"];

        $images = [];

        foreach (json_decode($this->images) as $image) {
            $images[] = "\\storage\\" . $image;
        }

        return $images;
    }
}
