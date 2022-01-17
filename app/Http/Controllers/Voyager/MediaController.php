<?php

namespace App\Http\Controllers\Voyager;

use App\Models\Media;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function download(Media $media)
    {
        $fileExtension =  pathinfo($media->filename, PATHINFO_EXTENSION);
        $friendlyFilename = "{$media->model->product->title}_{$media->name}.{$fileExtension}";

        return Storage::download(
            $media->storage_path,
            $friendlyFilename
        );
    }
}
