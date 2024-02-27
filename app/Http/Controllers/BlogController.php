<?php

namespace App\Http\Controllers;

use App\Modules\Blog\Actions\FetchBlog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function __construct()
    {
        // If needed.
    }

    /**
     * @param FetchVersions $action
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */
    public function index(FetchBlog $action): View|Factory|JsonResponse|RedirectResponse|Application
    {
        return $action->handle();
    }
}
