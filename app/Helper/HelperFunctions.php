<?php

use App\Models\Setting;
use App\Models\User;
use App\Models\UserOtp;
use Hashids\Hashids;
use Illuminate\Http\File;

if (!function_exists('generateUUID')) {
    /**
     * Generate unique random string
     * @param string $prefix
     * @return string
     */
    function generateUUID($id, $minLength = 16) {
        $hashids = new Hashids('coupons911', $minLength, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
        return $hashids->encode($id);
    }
}

if (!function_exists('generateOtp')) {
    /**
     * Generates a One-Time Password (OTP) for a given mobile number.
     *
     * @param string $mobile_no The mobile number for which the OTP needs to be generated.
     * @return UserOtp|null The generated OTP or null if an OTP already exists and has not expired.
     */
    function generateOtp($mobile_no)
    {
        $user = User::where('phone_number', $mobile_no)->first();
        $userOtp = UserOtp::where('user_id', $user->id)->latest()->first();
        $now = now();
        if($userOtp && $now->isBefore($userOtp->expire_at)){
            return $userOtp;
        }

        /* Create a New OTP */
        return UserOtp::create([
            'user_id' => $user->id,
            // 'otp' => rand(123456, 999999),
            'otp' => 123456,
            'expire_at' => $now->addMinutes(10)
        ]);
    }
}
    function minimumWithdraw()
    {
        $setting = Setting::first();
        $minWithdraw = 0;
        if($setting != null){
            $minWithdraw = $setting->minimum_withdraw;
        }
        return $minWithdraw;
    }

if (!function_exists('currency')) {
    function currency($value, $currency, $fractionDigits = 0)
    {
        $acceptedCurencies = ["USD" => "en_US", "VND" => "vi_VN"];

        if (!in_array($currency, array_keys($acceptedCurencies)))
            return $value;

        if (!is_numeric($value))
            return $value;

        $formatter = new NumberFormatter($acceptedCurencies[$currency], NumberFormatter::CURRENCY);
        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, $fractionDigits);
        $formattedNumber = $formatter->format($value);

        return $formattedNumber;
    }
}
