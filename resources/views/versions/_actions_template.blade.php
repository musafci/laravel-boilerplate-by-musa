{{-- @can('role-edit') --}}
    {{-- @if( isset($row->name) && $row->name != 'Admin') --}}
        <a class="btn btn-sm btn-info"
           href="{{ route($routeKey.'.edit', $row->id) }}">
            Edit
        </a>
    {{-- @endif --}}
{{-- @endcan --}}