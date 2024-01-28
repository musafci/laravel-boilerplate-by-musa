<?php

namespace App\Modules\Category\Actions;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class CategoryShow
{
    /**
     * @param $category
     * @return View|Factory|JsonResponse|RedirectResponse|Application
    */
    function handle($category): View|Factory|JsonResponse|RedirectResponse|Application
    {
        $breadcrumbs = [
            'Category' => route('category.index'),
            'Show'
        ];

        $category_data = Category::where('id', $category);
        if (!$category_data->exists()) {
            $notification = array(
                'message' => 'No data found!',
                'alert-type' => 'error'
            );

            return redirect()->route('category.index')->with($notification);
        }
        $category = $category_data->get()->toArray();
        // $user = User::find($log[0]['causer_id']);
        // $causer_user_name = $user->name ?? '';

        return view('category.show', compact('category', 'breadcrumbs'));
    }
}
