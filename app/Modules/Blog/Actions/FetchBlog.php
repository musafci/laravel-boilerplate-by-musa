<?php

namespace App\Modules\Blog\Actions;

use App\Modules\Blog\DataTable\BlogTable;
use App\Traits\RedirectWithNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class FetchBlog
{
    use RedirectWithNotification;

    /**
     * @param $model
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */
    public function handle($model): View|Factory|JsonResponse|RedirectResponse|Application
    {
        try {
            $query = $model::get();

            $breadcrumbs = [
                'Blog'
            ];

            $table = DataTables::of($query);
            $dynamic_blog = new BlogTable();

            if (request()->ajax()) {
                return $dynamic_blog->table($table);
            }

            return view('blog.index', compact('breadcrumbs'));
        } catch (\Exception $e) {
            Log::info('Blog Fetching Exception: ' . $e->getMessage());

            return $this->redirectMessage('blog.index', 'No blog Found!');
        }
    }
}
