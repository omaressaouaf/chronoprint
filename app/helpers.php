<?php

/**
 * Determine wether the file is an image or not
 *
 * @param \File
 * @return bool
 */
function file_is_image($file): bool
{
    $imageExtensions = ["jpg", "jpeg", "png", "svg"];

    return $file && in_array($file->extension(), $imageExtensions);
}

/**
 * Format a given price to float with two decimals
 *
 * @param float
 * @return float
 */
function formatPrice($price): float
{
    return round((float)$price, 2);
}
