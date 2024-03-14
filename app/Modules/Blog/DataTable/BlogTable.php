<?php

namespace App\Modules\Blog\DataTable;

use App\Interfaces\DynamicTableInterface;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class BlogTable implements DynamicTableInterface
{
    /**
     * @param $table
     * @return mixed
     */
    function table($table): mixed
    {
        $image_template = 'blog._image_template';

        $table->editColumn('category_id', function($row) {
            return Category::where('id', $row->category_id)->value('name');
        });

        $table->editColumn('body', function($row) {
            return strip_tags(Str::limit($row->body), 100);
        });

        $table->editColumn('created_at', function ($row) {
            return \DateTime::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('jS F, Y H:i:s A');
        });

        $table->editColumn('image', function ($row) use ($image_template) {
            return view($image_template, compact('row'));
        });

        $table->editColumn('created_by', function ($row) {
            return User::where('id', $row->created_by)->value('name');
        });

        $table->editColumn('actions', function ($row) {
            $actionTemplate = 'blog._actions_template';
            $routeKey = 'blog';
            return view($actionTemplate, compact('row', 'routeKey'));
        });

        return $table->make(true);
    }
}
