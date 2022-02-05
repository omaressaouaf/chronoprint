<?php

namespace App\Traits;

trait HasVoyagerImage
{
    /**
     * Get the image public path
     *
     * @return string
     */
    public function getPublicImageAttribute() : string
    {
        return $this->image ? "/storage/{$this->image}" : "/storage/products/default.jpg";
    }
}
