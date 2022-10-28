<?php

namespace App\Traits;

use App\Services\ImageService;
use Illuminate\Database\Eloquent\Model;

trait ImageCompression
{
    protected static function bootImageCompression(): void
    {
        static::creating(function (Model $model) {
            // At this point Livewire is initialized and we have access to the temporary filname...
            $filepondFilename = $model->featured_image;

            $compressedImage = ImageService::compress($model);

            // Swap file names
            $model->original_image = $filepondFilename;

            $model->featured_image = $compressedImage;
        });

        static::updating(function (Model $model) {
            $model->featured_image = ImageService::compress($model);
        });
    }
}
