<?php

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

/**
 * Determine wether the file is an image or not
 *
 * @param Illuminate\Http\UploadedFile|string $file
 * @return bool
 */
function file_is_image(UploadedFile|string $file): bool
{
    $fileExtension = gettype($file) === "string" ? pathinfo($file, PATHINFO_EXTENSION)  : $file->extension();

    $imageExtensions = ["jpg", "jpeg", "png", "svg"];

    return $file && in_array($fileExtension, $imageExtensions);
}

/**
 * Format a given price to float with two decimals
 *
 * @param float
 * @return float
 */
function format_price($price): float
{
    return number_format((float)$price, 2, ".", "");
}

/**
 * Generates a long unique string ref
 *
 * @return string
 */
function generate_ref(): string
{
    return Str::uuid() . Str::random();
}
