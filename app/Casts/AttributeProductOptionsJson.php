<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class AttributeProductOptionsJson implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        $decodedArray = json_decode($value, true, 512, JSON_FORCE_OBJECT);

        if (is_array($decodedArray)) {
            foreach ($decodedArray as $key => $item) {
                $decodedArray[$key]["prices"] = (object)$item["prices"];
            }
        }

        return $decodedArray;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        if (is_array($value)) {
            foreach ($value as $key => $item) {
                $value[$key]["prices"] = (object)$item["prices"];
            }
        }

        return json_encode($value);
    }
}
