<?php

namespace App\Http\Controllers;

use App\Http\Requests\Version\VersionRequest;
use App\Models\AppVersion;
use App\Modules\Versions\Actions\FetchVersions;
use App\Modules\Versions\Actions\VersionStore;
use App\Modules\Versions\Actions\VersionUpdate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AppVersionController extends Controller
{

    public function __construct()
    {
        // If needed.
    }

    /**
     * @param FetchVersions $action
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */
    public function index(FetchVersions $action): View|Factory|JsonResponse|RedirectResponse|Application
    {
        return $action->handle();
    }

    
    /**
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $breadcrumbs = [
            'Version' => route('version.index'),
            'Create'
        ];

        return view('versions.create', compact('breadcrumbs'));
    }


    /**
     * @param VersionRequest $request
     * @param VersionStore $action
     * @return RedirectResponse | String
     */
    public function store(VersionRequest $request, VersionStore $action): RedirectResponse | String
    {
        return $action->handle($request);
    }


    /**
     * @param AppVersion $version
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(AppVersion $version): Application|Factory|View|RedirectResponse
    {
        $breadcrumbs = [
            'Version' => route('version.index'),
            'Edit'
        ];

        return view('versions.edit', compact('breadcrumbs', 'version'));
    }


    /**
     * @param VersionRequest $request
     * @param AppVersion $version
     * @return  RedirectResponse|string
     */
    public function update(VersionRequest $request, AppVersion $version, VersionUpdate $action): RedirectResponse|string
    {
        return $action->handle($request, $version);
    }
}
