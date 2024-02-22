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

class StoreAppSetting
{
    use RedirectWithNotification, UploadTrait;

    /**
     * @param $request
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */

    public function handle($request): View|Factory|JsonResponse|RedirectResponse|Application
    {
        try {
            DB::beginTransaction();
            $setting = new AppSetting();
            $logo = null;

            if($request->logo) {
                $logo = $this->uploadImageToLocal($request->logo, '/logo/', 'logo_');
            }

            $setting->app_name = $request->app_name;
            $setting->app_description = $request->app_description;
            $setting->logo = $logo;
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