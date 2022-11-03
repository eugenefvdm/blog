<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Valuestore\Valuestore;

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
        // Sometimes you end up here without an image and then you should return
        if (! $model->featured_image) {
            return;
        }

        // // If the size wasn't specified check if there is a settings to change it
        // if ($xSize == 640 && $ySize == 480 ) {
        //     [$xSize, $ySize] = self::checkSettings($xSize, $ySize);
        // }

        if (Settings::homePageLayout() == 'grid') {
            return self::square($model, 200);
        }

        return self::crop($model, $xSize, $ySize);
    }

    private static function square($model, $size)
    {
        $retrievedImage = Storage::disk('blog')->get($model->featured_image);

        if (! $retrievedImage) {
            return;
        }

        $img = Image::make($retrievedImage); // You can probably make->fit->save

        $img->fit($size);

        $img->save(self::filepath($model)[1]);

        return self::filepath($model)[0];
    }

    private static function crop($model, $xSize, $ySize)
    {
        $retrievedImage = Storage::disk('blog')->get($model->featured_image);

        if (! $retrievedImage) {
            return;
        }

        $img = Image::make($retrievedImage);

        $img->resize($xSize, $ySize, function ($constraint) {
            $constraint->aspectRatio();

            $constraint->upsize();
        });

        // Center on a canvas
        $canvas = Image::canvas($xSize, $ySize);
        $canvas->insert($img, 'center');

        $img->save(self::filepath($model)[1]);

        return self::filepath($model)[0];
    }

    private static function checkSettings($x, $y)
    {
        $pathToFile = storage_path().'/app/settings.json';

        $valuestore = Valuestore::make($pathToFile, ['test' => '123']);

        $valuestore = Valuestore::make($pathToFile);

        if ($valuestore->get('x')) {
            $x = $valuestore->get('x');
        }

        if ($valuestore->get('y')) {
            $y = $valuestore->get('y');
        }

        return [$x, $y];
    }

    /**
     * Return the filename without extension and configured path.
     */
    private static function filepath($model)
    {
        $filename = pathinfo($model->attachment_file_names, PATHINFO_FILENAME).'-'.time().'.webp';

        $path = config('filesystems.disks.blog.root').'/';

        return [$filename, $path.$filename];
    }
}
