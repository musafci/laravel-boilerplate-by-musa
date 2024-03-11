<?php

namespace App\Modules\Versions\Actions;

use App\Models\AppVersion;
use App\Modules\Versions\DataTable\VersionTable;
use App\Traits\RedirectWithNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class FetchVersions
{
    use RedirectWithNotification;

    /**
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */

    function handle(): View|Factory|JsonResponse|RedirectResponse|Application
     {
        try {
            $query = AppVersion::get();

            $breadcrumbs = [
                'Version'
            ];

            $table = DataTables::of($query);
            $dynamic_version = new VersionTable();

            if (request()->ajax()) {
                return $dynamic_version->table($table);
            }

            return view('versions.index', compact('breadcrumbs'));
        } catch (\Exception $e) {
            Log::info('Version Fetching Exception: ' . $e->getMessage());

            return $this->redirectMessage('versions.index', 'No Versions Found!');
        }
    }
}