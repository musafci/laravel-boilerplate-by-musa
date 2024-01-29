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
    public function handle ($category): View|Factory|JsonResponse|RedirectResponse|Application
    {
        $breadcrumbs = [
            'Category' => route('category.index'),
            'Show'
        ];

        $category = Category::where('id', $category)->first();

        if(!$category instanceof Category) {
            $notification = array(
                'message' => 'No category found!',
                'alert-type' => 'error'
            );
            return redirect()->route('category.index')->with($notification);
        }

        return view('category.show', compact('category', 'breadcrumbs'));
    }
}
