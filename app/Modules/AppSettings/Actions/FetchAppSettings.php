<?php

namespace App\Modules\AppSettings\Actions;

use App\Models\AppSetting;
use App\Traits\RedirectWithNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
class FetchAppSettings
{
    use RedirectWithNotification;

    /**
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */

     function handle(): View|Factory|JsonResponse|RedirectResponse|Application
     {
        try {
            $query = AppSetting::get();
            $rows_count = $query->count();

            $breadcrumbs = [
                'App Settings'
            ];

            $table = DataTables::of($query);
            $dynamic_app_settings = new AppSettingTable();

            if (request()->ajax()) {
                return $dynamic_app_settings->table($table);
            }

            return view('app-settings.index', compact('breadcrumbs', 'rows_count'));
        } catch (\Exception $e) {
            Log::info('App Setting Fetching Exception: ' . $e->getMessage());

            return $this->redirectMessage('app-settings.index', 'No app Setting Found!');
        }
    }
}