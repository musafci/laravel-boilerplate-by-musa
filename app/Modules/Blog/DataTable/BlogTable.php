<?php

namespace App\Modules\Blog\DataTable;

use App\Interfaces\DynamicTableInterface;

class BlogTable implements DynamicTableInterface
{
    /**
     * @param $table
     * @return mixed
     */
    function table($table): mixed
    {
        $table->editColumn('created_at', function ($row) {
            return \DateTime::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('jS F, Y H:i:s A');
        });

        $table->editColumn('actions', function ($row) {
            $actionTemplate = 'blog._actions_template';
            $routeKey = 'blog';
            return view($actionTemplate, compact('row', 'routeKey'));
        });

        return $table->make(true);
    }
}
