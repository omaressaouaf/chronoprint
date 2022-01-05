<?php

namespace App\Traits;

use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;

trait HasMedia
{
    /**
     * Model has meny media items
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, "model");
    }

    /**
     * Hook into the Eloquent model deleted events
     * to delete media records from storage and database
     *
     * @return void
     */
    public static function bootHasMedia(): void
    {
        static::deleted(function ($model) {
            Storage::deleteDirectory($model->mediaRootFolderPath());
            Media::where("model_id", $model->id)->delete();
        });
    }

    /**
     * Return the root folder for all media files of the model
     *
     * @return string
     */
    abstract public function mediaRootFolderPath(): string;
}
