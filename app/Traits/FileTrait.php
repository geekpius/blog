<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait FileTrait
{

    public function saveFileToStorage(string $uploadedBase64File, Model $model, string $type = 'post'): void
    {
        try {

//            $file_name = 'files/posts/' . uniqid() . '.jpg';
//
//            $actualEncoded = explode(",", $uploadedBase64File);
//
//            $actualEncodedImage = (count($actualEncoded) > 1) ? $actualEncoded[1] : $actualEncoded[0];
//
//            file_put_contents($file_name, base64_decode($actualEncodedImage));
//            $model->files()->create([
//                'size' => \File::size($file_name),
//                'path' => $file_name,
//                'type' => $type,
//                'disk' => 'public',
//            ]);

            $file_name = 'posts/' . uniqid() . '.jpg';
            $actualEncoded = explode(",", $uploadedBase64File);
            $actualEncodedImage = (count($actualEncoded) > 1) ? $actualEncoded[1] : $actualEncoded[0];
            Storage::disk(env('FILESYSTEM_DRIVER'))->put($file_name, base64_decode($actualEncodedImage));

            $model->files()->create([
                'size' => Storage::disk(env('FILESYSTEM_DRIVER'))->size($file_name),
                'path' => $file_name,
                'type' => $type,
                'disk' => env('FILESYSTEM_DRIVER'),
            ]);
        } catch (\Exception $exception) {
            report($exception);
        }
    }
}
