<?php

namespace App\Modules\Blog\Actions;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EditBlog
{
    /**
     * @param $blog
     * @return Application|Factory|View
    */
    public function handle($blog): Application|Factory|View
    {
        $breadcrumbs = [
            'Blog' => route('blog.index'),
            'Edit'
        ];
        $categories = Category::select('id','name')->get();

        return view('blog.edit', compact('breadcrumbs','blog','categories'));
    }
}