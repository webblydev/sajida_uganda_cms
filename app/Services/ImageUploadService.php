<?php
// app/Services/ImageUploadService.php
namespace App\Services;

use Illuminate\Http\UploadedFile;
use Image;

class ImageUploadService
{
    public function uploadImages($file, $destinationPath, $resizeQuality = 60)
    {
            $uploadedFile = $this->processImage($file, $destinationPath, $resizeQuality);

        return $uploadedFile;
    }

    private function processImage(UploadedFile $file, $destinationPath, $resizeQuality)
    {
        $newImage = Image::make($file);
        $name = date('m-d-Y_H-i-s') . '-' . $file->getClientOriginalName();
        $newImage->save($destinationPath . $name, $resizeQuality);

        return $name;
    }
}
