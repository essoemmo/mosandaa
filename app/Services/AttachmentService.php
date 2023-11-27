<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
    /**
     * To Use This service u must add the following to config/filesustem.php
     *
     *   'public_uploads' => [
     *           'driver' => 'local',
     *           'root' => public_path('uploads'),
     *    ],
     *
     *  And Install  Intervention\Image\Facades\Image Package
     */
class AttachmentService{

    // to upload image with resize
    function image_uploader_with_resize($file , $folder='', $oldFile = null,$width = 300 , $height = 300) :string
    {
        if($oldFile)
            \Illuminate\Support\Facades\Storage::disk('public_uploads')->delete($oldFile);

        $path = 'uploads/' . $folder;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        Image::make($file)
            ->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($path . '/' . $file->hashName()));
        return  $folder . '/' . $file->hashName() ;
    }

    // to upload image without resize
    function image_uploader_without_resize($file , $folder='', $oldFile = null) :string
    {
        if($oldFile)
            \Illuminate\Support\Facades\Storage::disk('public_uploads')->delete($oldFile);

        $path = 'uploads/' . $folder;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $img = Image::make($file)->save(public_path($path . '/' . $file->hashName()));
        return  $folder . '/' . $file->hashName() ;
    }

    //to delete any file
    public static function deleteFile($folder , $file):void
    {
        \Illuminate\Support\Facades\Storage::disk('public_uploads')->delete('/'.$folder.'/' . $file);
    }

    // to upload file depend on your validation
    function file_uploader($file , $folder = '/',$oldFile = null) :string
    {
        if($oldFile)
            \Illuminate\Support\Facades\Storage::disk('public_uploads')->delete($oldFile);

        return  \Illuminate\Support\Facades\Storage::disk('public_uploads')->putFile($folder, $file);
    }


}
