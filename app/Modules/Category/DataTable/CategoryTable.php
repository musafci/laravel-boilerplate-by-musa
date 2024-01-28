<?php

namespace App\Modules\Category\DataTable;

use App\Interfaces\DynamicTableInterface;

class CategoryTable implements DynamicTableInterface
{
    /**
     * @param $table
     * @return mixed
    */
    function table($table): mixed
    {
        $actionTemplate = 'category._actions_template';
        $isParentTemplate = 'category._is_parent_template';
        $iconTemplate = 'category._icon_template';
        $bannerTemplate = 'category._banner_template';

        $table->editColumn('is_parent', function ($row) use ($isParentTemplate) {
            return view($isParentTemplate, compact('row'));
        });
        $table->editColumn('icon', function ($row) use ($iconTemplate) {
            return view($iconTemplate, compact('row'));
        });
        $table->editColumn('banner', function ($row) use ($bannerTemplate) {
            return view($bannerTemplate, compact('row'));
        });
        $table->editColumn('actions', function ($row) use ($actionTemplate) {
            $routeKey = 'category';
            return view($actionTemplate, compact('row', 'routeKey'));
        });
        return $table->make(true);
    }
}
