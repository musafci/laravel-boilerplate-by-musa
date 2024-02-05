<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait UploadTrait {
    /**
     * @param $image, 
    */
    public function uploadImageToLocal($image, $destinationPath, $prefix, $width = null, $height = null, $previousImage = null)
    {
        try {
            $finalDestinationPath = 'app/public/' . $destinationPath;
            $manager = new ImageManager(new Driver());
            $imageResize = $manager->read($image);

            self::checkDirectory($finalDestinationPath);

            // $imageResize = Image::make($image);
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