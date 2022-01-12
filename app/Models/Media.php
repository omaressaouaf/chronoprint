<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function getPublicPathAttribute(): string
    {
        return "/storage/$this->path";
    }

    /**
     * Moves the media item to a new model and location
     *
     * @param Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function moveToModel(Model $model): void
    {
        $newPath = $model->mediaRootFolderPath() . "/" . $this->filename;
        Storage::disk("public")->move($this->path, $newPath);

        $this->model_type = $model::class;
        $this->model_id = $model->id;
        $this->path = $newPath;
        $this->save();
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    public static function booted(): void
    {
        static::deleted(function ($media) {
            Storage::disk("public")->delete($media->path);
        });
    }
}
