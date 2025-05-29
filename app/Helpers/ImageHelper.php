<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageHelper
{
  public static function uploadImage($file, $folder = 'uploads')
{
    $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs($folder, $filename, 'public');
    if (!Storage::disk('public')->exists("$folder/$filename")) {
        throw new \Exception("File not uploaded.");
    }
    return 'storage/' . $path;
}

}
