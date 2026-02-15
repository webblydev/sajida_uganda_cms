<?php
// app/Services/ImageUploadService.php
namespace App\Services;

use Illuminate\Http\UploadedFile;
use Image;

class ImageUploadService
{
    public function uploadImages($file, $destinationPath, $resizeQuality = 60)
    {
        if (is_array($file)) {
            $uploadedFiles = [];

            foreach ($file as $singleFile) {
                if ($singleFile instanceof UploadedFile) {
                    $uploadedFiles[] = $this->processImage($singleFile, $destinationPath, $resizeQuality);
                }
            }

            return $uploadedFiles;
        }

        if ($file instanceof UploadedFile) {
            return $this->processImage($file, $destinationPath, $resizeQuality);
        }

        return null;
    }

    private function processImage(UploadedFile $file, $destinationPath, $resizeQuality)
    {
        $newImage = Image::make($file);
        $name = date('m-d-Y_H-i-s') . '-' . $file->getClientOriginalName();
        $newImage->save($destinationPath . $name, $resizeQuality);

        return $name;
    }
}
