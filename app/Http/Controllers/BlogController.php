<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\BlogRequest;
use App\Modules\Blog\Actions\CreateBlog;
use App\Modules\Blog\Actions\FetchBlog;
use App\Modules\Blog\Actions\StoreBlog;
use App\Modules\Blog\Helper\BlogHelper;
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
     * @param FetchBlog $action
     * @param BlogHelper $helper
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */
    public function index(BlogHelper $helper, FetchBlog $action): View|Factory|JsonResponse|RedirectResponse|Application
    {
        return $action->handle($helper->modelOf());
    }

    /**
     * @return Application|Factory|View
     */
    public function create(CreateBlog $action): Application|Factory|View
    {
        return $action->handle();
    }

    /**
     * @param BlogRequest $request
     * @param BlogHelper $helper
     * @param StoreBlog $action
     * @return RedirectResponse
     */
    public function store(BlogRequest $request, BlogHelper $helper, StoreBlog $action): RedirectResponse
    {
        return $action->handle($request, $helper->modelOf());
    }
}
