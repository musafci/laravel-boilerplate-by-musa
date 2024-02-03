<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager as Image;

trait UploadTrait {
    // public function uploadBase64ToLocalOFF($base64Image, $imagePath, $prefix, $previousImage = null) {
    //     // Get the extension from the base64 image data
    //     $imageParts = explode(";base64,", $base64Image);
    //     $imageTypeAux = explode("image/", $imageParts[0]);
    //     $imageType = $imageTypeAux[1];
    //     $image = base64_decode($imageParts[1]);

    //     // Generate a unique filename for the image
    //     $filename = $prefix . time() . '.' . $imageType;

    //     // Specify the path where you want to store the uploaded image
    //     $path = public_path($imagePath . $filename);

    //     // // Save the image to the specified path
    //     // file_put_contents($path, $image);

    //     // Save the original image
    //     $image = Image::make($image);
    //     $image->save($path);

    //     // Delete the previous image if it exists
    //     if ($imagePath.$previousImage && File::exists($imagePath.$previousImage)) {
    //         File::delete($imagePath.$previousImage);
    //     }
    //     return $filename;
    // }

    // public function uploadImageToLocalOFF($image, $imagePath, $prefix, $previousImage = null) {
    //     $filename = $prefix . time() . '.' . $image->getClientOriginalExtension();
    //     $path = public_path($imagePath . $filename);

    //     // Save the original image
    //     $image = Image::make($image);
    //     $image->save($path);

    //     // Delete the previous image if it exists
    //     if ($imagePath.$previousImage && File::exists($imagePath.$previousImage)) {
    //         File::delete($imagePath.$previousImage);
    //     }
    //     return $filename;
    // }

    public function uploadImageToLocal($image, $destinationPath, $prefix, $width = null, $height = null, $previousImage = null)
    {
        try {
            $finalDestinationPath = 'app/public/' . $destinationPath;

            self::checkDirectory($finalDestinationPath);

            $imageResize = Image::make($image);
            $name = $prefix . rand(100000, 999999) . time() . '.' . $image->getClientOriginalExtension();

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
            $imageUrl = $destinationPath . $name;

            if (!empty($previousImage)) {
                $this->deleteImage($previousImage, $finalDestinationPath);
            }

            return $imageUrl;

        } catch (\Exception $ex) {
            \Log::info('Image upload exception = '. $ex->getMessage());
            return false;
        }
    }

    public function uploadBase64ToLocal($image, $destinationPath, $prefix, $width = null, $height = null, $previousImage = null)
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
            $name = $prefix . rand(100000, 999999) . time() . '.' . $ext;

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
            $imageUrl = $destinationPath . $name;

            if (!empty($previousImage)) {
                $this->deleteImage($previousImage, $finalDestinationPath);
            }

            return $imageUrl;

        } catch (\Exception $ex) {
            \Log::info('Image upload exception = '. $ex->getMessage());
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
        $path = $directory . $file_name;
        File::delete(storage_path($path));
        return true;
    }
}