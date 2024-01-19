<a class="btn btn-sm btn-info mr-2"
    href="{{ route($routeKey.'.edit', $row->id) }}">
    Edit
</a>
<a class="btn btn-sm btn-danger delete-menu" href="javascript:;;" data-id="{{ $row->id }}">
    Delete
</a>