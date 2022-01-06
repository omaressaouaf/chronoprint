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

    public function getPublicPathAttribute()
    {
        return "/storage/$this->path";
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
