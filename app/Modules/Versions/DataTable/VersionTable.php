<?php

namespace App\Modules\Versions\DataTable;

use App\Interfaces\DynamicTableInterface;

class VersionTable implements DynamicTableInterface
{
    /**
     * @param $table
     * @return mixed
     */
    function table($table): mixed
    {
        $table->editColumn('release_date', function ($row) {
            return \DateTime::createFromFormat('Y-m-d H:i:s', $row->release_date)->format('jS F, Y H:i:s A');
        });
        
        $table->editColumn('created_at', function ($row) {
            return \DateTime::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('jS F, Y H:i:s A');
        });

        $table->editColumn('actions', function ($row) {
            $actionTemplate = 'versions._actions_template';
            $routeKey = 'version';
            return view($actionTemplate, compact('row', 'routeKey'));
        });

        return $table->make(true);
    }
}
