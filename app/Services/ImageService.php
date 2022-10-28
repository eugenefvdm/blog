<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * Generic routine to compress images on creating and updating. It uses
     * Intervention library will be called to resize and upsize to a
     * certain aspect ratio based on X and Y dimensions.
     *
     * Used by model observer on Blog post
     */
    public static function compress(Model $model, $xSize = 640, $ySize = 480)
    {
        $retrievedImage = Storage::disk('blog')->get($model->featured_image);

        $croppedImage = Image::make($retrievedImage);

        $croppedImage->resize($xSize, $ySize, function ($constraint) {
            $constraint->aspectRatio();

            $constraint->upsize();
        });

        // Center on a canvas
        $canvas = Image::canvas($xSize, $ySize);

        $canvas->insert($croppedImage, 'center');

        // attachment_file_names is internal to Filepond and Filamentphp
        // Intervention automatically encodes the file if saved as .webp!
        $filename = pathinfo($model->attachment_file_names, PATHINFO_FILENAME).'-'.time().'.webp';

        $path = config('filesystems.disks.blog.root').'/';

        $croppedImage->save($path.$filename);

        return $filename;
    }
}
