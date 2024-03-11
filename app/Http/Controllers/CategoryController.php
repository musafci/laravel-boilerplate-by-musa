<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use App\Modules\Category\Actions\CategoryDelete;
use App\Modules\Category\Actions\CategoryList;
use App\Modules\Category\Actions\CategoryShow;
use App\Modules\Category\Actions\CategoryStore;
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
    public function create(): Application|Factory|View
    {
        $breadcrumbs = [
            'Category' => route('category.index'),
            'Create'
        ];

        return view('category.create', compact('breadcrumbs'));
    }



    /**
     * @param CategoryRequest $request
     * @param CategoryStore $action
     * @return RedirectResponse|string
    */
    public function store(CategoryRequest $request, CategoryStore $action):  RedirectResponse|string
    {
        return $action->handle($request);
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
     * @param Category $category
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(Category $category): Application|Factory|View|RedirectResponse
    {
        $breadcrumbs = [
            'Category' => route('category.index'),
            'Edit'
        ];

        $categories = Category::all()->except($category->id);;

        return view('category.edit', compact('breadcrumbs', 'category', 'categories'));
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
