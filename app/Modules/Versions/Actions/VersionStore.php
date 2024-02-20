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

class VersionStore
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
            $request->merge(['release_date' => Carbon::now()]);
            AppVersion::create($request->all());

            $notification = array(
                'message' => 'App version created successfully!',
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