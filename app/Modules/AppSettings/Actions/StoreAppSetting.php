<?php

namespace App\Modules\AppSettings\Actions;

use App\Models\AppSetting;
use App\Traits\RedirectWithNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StoreAppSetting
{
    use RedirectWithNotification;

    /**
     * @param $request
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */

    public function handle($request): View|Factory|JsonResponse|RedirectResponse|Application
    {
        try {
            DB::beginTransaction();
            $setting = new AppSetting();

            if ($request->logo) {
                $file = $request->logo;
                $file_name = time() . rand(10000, 99999) . '.' . $file->extension();
                $filePath = 'app-setting/' . $file_name;
                $res = Storage::disk('s3')->put($filePath, file_get_contents($file));
                if ($res) {
                    $message = 'Logo store successfully.';
                    $setting->logo = $filePath;
                } else {
                    $status = 500;
                    $message = 'Logo stored failed!';
                    Log::info('Logo stored exception: ' . $message);

                    return $this->redirectMessage('app-settings.index', $message);
                }
            }

            $setting->app_name = $request->app_name;
            $setting->app_description = $request->app_description;
            $setting->save();

            $notification = array(
                'message' => 'App setting created successfully!',
                'alert-type' => 'success'
            );
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e->getFile() . ':' . $e->getLine() . ' ' . $e->getMessage());
            $notification = array(
                'message' => 'App setting creation failed!',
                'alert-type' => 'error'
            );
            DB::rollBack();
        }
        return redirect()->route('app.setting.index')->with($notification);
    }
}