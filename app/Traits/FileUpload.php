<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileUpload
{
    public function uploadFile(UploadedFile $file, string $dir = 'uploads')
    {
        $fileName = 'mydemy_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path($dir), $fileName);

        return  '/' . $dir . '/' . $fileName;
    }
}
