<?php

namespace App\Modules\AppSettings\Actions;

use App\Models\AppSetting;
use App\Traits\RedirectWithNotification;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class DeleteAppSetting
{
    use RedirectWithNotification;

    /**
     * @param $app_setting
     * @return JsonResponse
     */

    public function handle($app_setting): JsonResponse
    {
        $app_setting_data = AppSetting::find($app_setting);
        try {
            $app_setting_data->delete();

            $notification = [
                'msg'       => "App setting successfully deleted.",
                'status'    => 'success'
            ];
        }
        catch (QueryException $qe)
        {
            Log::error($qe->getMessage());

            $notification = [
                'msg'       => "Operation Failed!",
                'status'    => 'error'
            ];
        }
        catch (\Exception $e)
        {
            Log::error($e->getFile() . ':' . $e->getLine() . ' ' . $e->getMessage());
            $notification = [
                'msg'       => "Operation Failed!",
                'status'    => 'error'
            ];
        }

        return response()->json($notification);
    }
}