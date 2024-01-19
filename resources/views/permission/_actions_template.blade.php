
@can('permission-show')
    <a class="btn btn-sm btn-info mr-2"
       href="{{ route($routeKey.'.show', $row->id) }}">
        Show
    </a>
@endcan

@can('permission-show')
    @if( isset($row->name) && $row->name != 'Super Admin' )
        <a class="btn btn-sm btn-danger delete-role"
           href="javascript:;;" data-id="{{ $row->id }}">
            Delete
        </a>
    @endif
@endcan

