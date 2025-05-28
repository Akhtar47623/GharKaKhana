<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageHelper
{
    public static function uploadImage($file, $folder = 'uploads')
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs("public/$folder", $filename);
        return Storage::url($path); // returns a public URL
    }
}
