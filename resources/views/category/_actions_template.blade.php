<a class="btn btn-sm btn-primary mr-2"
   href="{{ route($routeKey.'.show', $row->id) }}">
    View
</a>
<a class="btn btn-sm btn-info mr-2"
   href="{{ route($routeKey.'.edit', $row->id) }}">
    Edit
</a>
<a class="btn btn-sm btn-danger delete-category mr-2"
   href="javascript:;;" data-id="{{ $row->id }}">
    Delete
</a>