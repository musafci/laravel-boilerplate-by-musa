<a class="btn btn-sm btn-info"
   @if($row->status == 'closed')
       href="{{ route($routeKey.'.action', ['view', $row->id]) }}">
       View
    @elseif($row->status == 'assigned' || $row->status == 'in_progress')
       href="{{ route($routeKey.'.action', ['reply', $row->id]) }}">
       Reply
   @endif
</a>
