@can('role-edit')
    @if( isset($row->name) && $row->name != 'Admin')
        <a class="btn btn-sm btn-info"
           href="{{ route($routeKey.'.edit', $row->id) }}">
            Edit
        </a>
    @endif
@endcan
{{--@can('role-delete')--}}
{{--    @if( isset($row->name) && $row->name != 'Super Admin')--}}
{{--        <a class="btn btn-sm btn-danger delete-role"--}}
{{--           href="javascript:;;" data-id="{{ $row->id }}">--}}
{{--            Delete--}}
{{--        </a>--}}
{{--    @endif--}}
{{--@endcan--}}
