<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

    function convert2english($string)
    {
        $newNumbers = array('PM','AM','0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $arabic = array('م','ص','٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $string = str_replace($arabic, $newNumbers, $string);
        return $string;
    }

    function seconds2human($ss)
    {
        $s = $ss % 60;
        $m = floor(($ss % 3600) / 60);
        $h = floor(($ss % 86400) / 3600);
        $d = floor(($ss % 2592000) / 86400);
        $M = floor($ss / 2592000);

        return " $m : $h : $d    يوم   ";
    }

    function KmDistance($longFrom,$longTo,$latFrom,$latTo)
    {
        //Calculate distance from latitude and longitude
        $theta = $longFrom - $longTo;
        $dist = sin(deg2rad($latFrom)) * sin(deg2rad($latTo)) +  cos(deg2rad($latFrom)) * cos(deg2rad($latTo)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        $distance = ($miles * 1.609344);
        return  round($distance,2);
    }

    function UploadImage($file,$path)
    {
            $hashedname = $file->hashName();
            //Resize image here
            $img = Image::make($file)->resize(1600, 1600, function($constraint) { $constraint->aspectRatio(); });
            Storage::putFileAs($path.'/' , $file ,$hashedname);
            $thumbnailpath = 'storage/'.$path.'/'.$hashedname;
            $img->save($thumbnailpath);
            return $thumbnailpath;

    }

    function UploadFile($file,$path)
    {
        if ($file) {
            $hashedname = $file->hashName();
            Storage::putFileAs($path.'/' , $file ,$hashedname);
            $thumbnailpath = 'storage/'.$path.'/'.$hashedname;
            return $thumbnailpath;
        }
    }

    function getImagePath($image)
    {
        return asset($image);
    }
