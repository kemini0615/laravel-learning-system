<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait FileUpload
{
    public function uploadFile(UploadedFile $file, string $dir = 'uploads')
    {
        $fileName = 'mydemy_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path($dir), $fileName);

        return  '/' . $dir . '/' . $fileName;
    }

    public function deleteFile(string $path)
    {
        if (File::exists(public_path($path))) {
            return File::delete(public_path($path));
        }
        return false;
    }
}
