<?php

namespace App\Modules\Versions\Actions;

use App\Models\AppVersion;
use App\Traits\RedirectWithNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VersionUpdate
{
    use RedirectWithNotification;

    /**
     * @param VersionRequest $request
     * @param AppVersion $version
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */

    public function handle($request, $version): View|Factory|JsonResponse|RedirectResponse|Application
    {
        try {
            DB::beginTransaction();
            $version_data = AppVersion::find($version->id);
            if (!$version_data instanceof AppVersion) {
                return $this->redirectMessage('version.index', 'Edit not possible!');
            }
            $request->merge(['release_date' => Carbon::now()]);

            $version_data->version_number = $request->version_number;
            $version_data->status = $request->status;
            $version_data->release_date = $request->release_date;
            $version_data->save();
            
            $notification = array(
                'message' => 'App version update successfully!',
                'alert-type' => 'success'
            );
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e->getFile() . ':' . $e->getLine() . ' ' . $e->getMessage());
            $notification = array(
                'message' => 'App version creation failed!',
                'alert-type' => 'error'
            );
            DB::rollBack();
        }
        return redirect()->route('version.index')->with($notification);
    }
}