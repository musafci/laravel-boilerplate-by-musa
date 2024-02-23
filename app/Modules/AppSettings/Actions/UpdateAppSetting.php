<?php

namespace App\Modules\AppSettings\Actions;

use App\Models\AppSetting;
use App\Traits\RedirectWithNotification;
use App\Traits\UploadTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UpdateAppSetting
{
    use RedirectWithNotification, UploadTrait;

    /**
     * @param AppSettingRequest $request
     * @param AppSetting $setting
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */

    public function handle($request, $setting): View|Factory|JsonResponse|RedirectResponse|Application
    {
        try {
            DB::beginTransaction();
            $app_setting_data = AppSetting::find($setting->id);
            if (!$app_setting_data instanceof AppSetting) {
                return $this->redirectMessage('app.setting.index', 'Edit not possible!');
            }

            $logo = null;

            if($request->logo) {
                $logo = $this->uploadImageToLocal($request->logo, '/logo/', 'logo_');
            }

            $app_setting_data->app_name = $request->app_name;
            $app_setting_data->app_description = $request->app_description;
            $app_setting_data->logo = $logo;
            $app_setting_data->save();
            
            $notification = array(
                'message' => 'App setting update successfully!',
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