<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppSetting\AppSettingRequest;
use App\Models\AppSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AppSettingController extends Controller
{
    public function __construct()
    {
        // If needed.
    }


    /**
     * @param FetchAppSettings $action
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */
    public function index(FetchAppSettings $action): View|Factory|JsonResponse|RedirectResponse|Application
    {
        return $action->handle();
    }


    /**
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $breadcrumbs = [
            'App Setting' => route('app.setting.index'),
            'Create'
        ];

        return view('app-settings.create', compact('breadcrumbs'));
    }


    /**
     * @param AppSettingRequest $request
     * @param StoreAppSetting $action
     * @return RedirectResponse | String
     */
    public function store(AppSettingRequest $request, StoreAppSetting $action): RedirectResponse | String
    {
        return $action->handle($request);
    }


    /**
     * @param AppSetting $setting
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(AppSetting $setting): Application|Factory|View|RedirectResponse
    {
        $breadcrumbs = [
            'App Setting' => route('app.setting.index'),
            'Edit'
        ];

        return view('app-settings.edit', compact('breadcrumbs', 'setting'));
    }


    /**
     * @param AppSettingRequest $request
     * @param AppSetting $setting
     * @return  RedirectResponse|string
     */
    public function update(AppSettingRequest $request, AppSetting $setting, UpdateAppSetting $action): RedirectResponse|string
    {
        return $action->handle($request, $setting);
    }


    /**
     * @param AppSettingRequest $request
     * @param DeleteAppSetting $action
     * @return JsonResponse
     */
    public function destroy(AppSettingRequest $request, DeleteAppSetting $action): JsonResponse
    {
        return $action->handle($request->id);
    }
}
