<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use App\Modules\Category\Actions\CategoryDelete;
use App\Modules\Category\Actions\CategoryList;
use App\Modules\Category\Actions\CategoryShow;
use App\Modules\Category\Actions\FetchCategory;
use App\Modules\Category\Actions\ParentCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function __construct()
    {
        // If needed
    }



    /**
     * @return View|Factory|JsonResponse|RedirectResponse|Application
    */
    public function index(FetchCategory $action): View|Factory|JsonResponse|RedirectResponse|Application
    {
        return $action->handle();
    }



    /**
     * @return Application|Factory|View
    */
    public function create()
    {
        $breadcrumbs = [
            'Category' => route('category.index'),
            'Create'
        ];

        return view('category.create', compact('breadcrumbs'));
    }



    /**
     * @return JsonResponse
    */
    public function list(CategoryList $action): JsonResponse
    {
        return $action->handle();
    }



    /**
     * @param Category $category
     * @return View|Factory|JsonResponse|RedirectResponse|Application
    */
    public function show($category, CategoryShow $action): View|Factory|JsonResponse|RedirectResponse|Application
    {
        return $action->handle($category);
    }



    /**
     * @return JsonResponse
    */
    public function parent($category, ParentCategory $action): JsonResponse
    {
        return $action->handle($category);
    }


    /**
     * @param CategoryRequest $request
     * @param CategoryDelete $action
     * @return JsonResponse
    */
    public function destroy(CategoryRequest $request, CategoryDelete $action): JsonResponse
    {
        return $action->handle($request);
    }
}
