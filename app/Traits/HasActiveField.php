<?php

namespace App\Traits;

trait HasActiveField
{
    /**
     * Active scope
     *
     * @return string
     */
    public function scopeActive($query)
    {
        $query->where('active', true);
    }
}
