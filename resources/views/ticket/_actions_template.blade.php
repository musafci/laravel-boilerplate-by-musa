<a class="btn btn-sm btn-info @disabled($row->status != "new")"
    href="{{ route($routeKey.'.reply', $row->id) }}">
    Assign
</a>
&nbsp;
@if($row->status != "Open")
    <a class="btn btn-sm btn-info"
        href="{{ route($routeKey.'.show', $row->id) }}">
        View
    </a>
@endif
