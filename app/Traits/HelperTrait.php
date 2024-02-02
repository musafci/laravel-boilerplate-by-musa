<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

trait HelperTrait {
    protected function generateRandom($length, $type = 'alphanumeric') {
        $characters = '';
        
        switch ($type) {
            case 'int':
                $characters = '0123456789';
                break;
            case 'alpha':
                $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'mix':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'small_letters_number':
                $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
                break;
            default:
                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
        }
        
        $characters = str_shuffle($characters);
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    protected function generateQrImage($productId, $code) {
        try {
            $barcodeImage = \DNS2D::getBarcodePNG($code, "QRCODE");
            $image = base64_decode($barcodeImage);
            $filename = Str::uuid().'_'.time() . '.' . 'png';
            $finalDestinationPath = 'app/public/' . 'qrcode';
            self::checkDirectory($finalDestinationPath);
            $imageResize = Image::make($image);
            $imageResize->save(storage_path("{$finalDestinationPath}/{$filename}"));
            $imageUrl = '/storage'.'/qrcode'. '/' . $filename;
            return $imageUrl;
        } catch (\Exception $ex) {
            Log::info('Something went wrong in generateQrImage() method. Error Message  = '. $ex->getMessage());
            return false;
        }
    }
    
}