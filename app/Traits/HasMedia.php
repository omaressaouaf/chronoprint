<?php

namespace App\Traits;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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
            DB::afterCommit(function () use ($model) {
                Storage::disk("public")->deleteDirectory($model->mediaRootFolderPath());
                Media::where("model_id", $model->id)->where("model_type", $model::class)->delete();
            });
        });
    }

    /**
     * Return the root folder for all media files of the model
     *
     * @return string
     */
    abstract public function mediaRootFolderPath(): string;

    /**
     * Associates the media item with the model
     *
     * @param Illuminate\Http\UploadedFile $file
     * @param string $mediaItemName
     * @return void
     */
    public function addMediaItem(UploadedFile $file, string $mediaItemName): void
    {
        $path = $file->store($this->mediaRootFolderPath(), "public");

        $this->media()->create([
            "name" => $mediaItemName,
            "filename" => $file->hashName(),
            "path" => $path,
            "mime_type" => $file->getMimeType(),
            "size" => $file->getSize()
        ]);
    }
}
