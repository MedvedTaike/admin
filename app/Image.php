<?php

namespace App;

use Illuminate\Support\Facades\File;

class Image {

    public static function uploadImage($image, $path, $remotePath, $size)
    {
        \Image::configure(['driver' => 'imagick']);
        $sample = \Image::make($image)->encode('jpg')->resize($size, $size, function ($constraint) {
            $constraint->aspectRatio();
        });
        $sample->resizeCanvas($size, $size, 'center', false, array(255, 255, 255, 0));
        $sample->save($path);
        // File::copy($path, $remotePath);
    }
}