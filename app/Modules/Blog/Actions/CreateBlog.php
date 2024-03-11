<?php

namespace App\Modules\Blog\Actions;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CreateBlog
{
    /**
     * @return Application|Factory|View
    */
    public function handle(): Application|Factory|View
    {
        $breadcrumbs = [
            'Blog' => route('blog.index'),
            'Create'
        ];
        $categories = Category::select('id','name')->get();

        return view('blog.create', compact('breadcrumbs','categories'));
    }
}