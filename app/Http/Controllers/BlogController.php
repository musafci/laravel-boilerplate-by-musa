<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\BlogRequest;
use App\Models\Category;
use App\Modules\Blog\Actions\FetchBlog;
use App\Modules\Blog\Actions\StoreBlog;
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
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */
    public function index(FetchBlog $action): View|Factory|JsonResponse|RedirectResponse|Application
    {
        return $action->handle();
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $breadcrumbs = [
            'Blog' => route('blog.index'),
            'Create'
        ];
        $categories = Category::select('id','name')->get();

        return view('blog.create', compact('breadcrumbs','categories'));
    }

    /**
     * @param BlogRequest $request
     * @param StoreBlog $action
     * @return RedirectResponse
     */
    public function store(BlogRequest $request, StoreBlog $action): RedirectResponse
    {
        return $action->handle($request);
    }
}
