<?php

namespace App\Modules\Category\Actions;

use App\Models\Category;
use App\Modules\Category\DataTable\CategoryTable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\DataTables;

class FetchCategory {
    /**
     * @return View|Factory|JsonResponse|RedirectResponse|Application
    */
    function handle(): View|Factory|JsonResponse|RedirectResponse|Application
    {
        $breadcrumbs = [
            'Category Management'
        ];

        $select = [
            'categories.id',
            'categories.name',
            'categories.is_parent',
            'categories.parent_id',
            'categories.icon',
            'categories.banner',
            'parent.name as parent_name'
        ];
        $query = Category::select($select)
                ->leftJoin('categories as parent', 'categories.parent_id', '=', 'parent.id')
                ->get();

        $table = DataTables::of($query);
        $dynamic_category = new CategoryTable();

        if (request()->ajax())
        {
            return $dynamic_category->table($table);
        }

        return view('category.index', compact('breadcrumbs'));
    }
}