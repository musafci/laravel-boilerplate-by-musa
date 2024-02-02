<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

trait UploadTrait {
    public function uploadBase64ToLocal($base64Image, $imagePath, $prefix, $previousImage = null) {
        // Get the extension from the base64 image data
        $imageParts = explode(";base64,", $base64Image);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1];
        $image = base64_decode($imageParts[1]);

        // Generate a unique filename for the image
        $filename = $prefix . time() . '.' . $imageType;

        $finalDestinationPath = 'app/public/' . $imagePath;
        self::checkDirectory($finalDestinationPath);
        $imageResize = Image::make($image);
        $imageResize->save(storage_path("{$finalDestinationPath}/{$filename}"));
        $imageUrl = '/storage'.$imagePath. '/' . $filename;
        return $imageUrl;

        // Delete the previous image if it exists
        // if ($imagePath.$previousImage && File::exists($imagePath.$previousImage)) {
        //     File::delete($imagePath.$previousImage);
        // }
        // return $filename;
    }
    public function uploadImageToLocal($image, $imagePath, $prefix = null, $previousImage = null) {
        $filename = $prefix . generateUUID(time(),12) . '.' . $image->getClientOriginalExtension();
        $finalDestinationPath = 'app/public/' . $imagePath;
        self::checkDirectory($finalDestinationPath);
        $imageResize = Image::make($image);
        $imageResize->save(storage_path("{$finalDestinationPath}/{$filename}"));
        $imageUrl = '/storage'.$imagePath. '/' . $filename;
        return $imageUrl;

        // Delete the previous image if it exists
        // if ($imagePath.$previousImage && File::exists($imagePath.$previousImage)) {
        //     File::delete($imagePath.$previousImage);
        // }
        // return $filename;
    }
    public function uploadBase64ToLocalOLD($image, $destinationPath, $width = null, $height = null, $previousImage = null)
    {
        try {
            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $ext = $image_type_aux[1];

            $image = str_replace('data:image/'.$ext.';base64,', '', $image);
            $file  = str_replace(' ', '+', $image);
            $finalDestinationPath = 'app/public/' . $destinationPath;
             self::checkDirectory($finalDestinationPath);

            $imageResize = Image::make(base64_decode($file));
            $name = rand(100000, 999999) . time() . '.' . $ext;

            if (!empty($width) && !empty($height)) {

                $orgWidth  = $imageResize->width();
                $orgHeight = $imageResize->height();

                if ($orgWidth >= $orgHeight) {
                    $imageResize->resize($width, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else {
                    $imageResize->resize(null, $height, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            $imageResize->save(storage_path("{$finalDestinationPath}/{$name}"));
            $imageUrl = '/storage'.$destinationPath. '/' . $name;

            // if (!empty($previousImage)) {
            //     $this->deleteImage($previousImage, $finalDestinationPath);
            // }
            return $imageUrl;
        } catch (\Exception $ex) {
            Log::info('image upload ex = '. $ex->getMessage());
            return false;
        }
    }

    private static function checkDirectory($dir)
    {
        File::makeDirectory(storage_path($dir), 0777, true, true);
    }

    public function deleteImage($imagePath, $directory)
    {
        $file_name  = substr($imagePath, strrpos($imagePath, '/') + 1);
        $path       = $directory . $file_name;
        File::delete($path);
        return true;
    }
}
