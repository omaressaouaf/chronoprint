<?php

function file_is_image($file)
{
    $imageExtensions = ["jpg" , "jpeg" , "png" , "svg"];

    return $file && in_array($file->extension(), $imageExtensions);
}
