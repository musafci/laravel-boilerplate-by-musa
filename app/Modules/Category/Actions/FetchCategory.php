<?php

namespace App\Modules\Category\Actions;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class FetchCategory {
    /**
     * @return View|Factory|JsonResponse|RedirectResponse|Application
    */
    function handle(): View|Factory|JsonResponse|RedirectResponse|Application
    {
        $breadcrumbs = [
            'Category Management'
        ];

        return view('category.index', compact('breadcrumbs'));
    }
}