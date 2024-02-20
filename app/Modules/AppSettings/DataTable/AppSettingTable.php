<?php

namespace App\Modules\AppSettings\DataTable;

use App\Interfaces\DynamicTableInterface;

class AppSettingTable implements DynamicTableInterface
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

        $table->editColumn('logo', function ($row) {
            $actionTemplate = 'app-settings._image_template';
            return view($actionTemplate, compact('row'));
        });

        $table->editColumn('actions', function ($row) {
            $actionTemplate = 'app-settings._actions_template';
            $routeKey = 'app.setting';
            return view($actionTemplate, compact('row', 'routeKey'));
        });

        return $table->make(true);
    }
}
