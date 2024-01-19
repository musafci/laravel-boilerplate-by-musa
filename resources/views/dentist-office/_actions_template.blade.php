@role(['Super Admin', 'Admin', 'Manager'])
    <a class="btn btn-sm btn-info"
       href="{{ route($routeKey.'.edit', $row->id) }}">
        Edit
    </a>
@endrole
&nbsp;
@can('dentist-list')
    <a class="btn btn-sm btn-info"
       href="{{ route($routeKey.'.show', $row->id) }}">
        Show
    </a>
@endcan
&nbsp;
@role(['Super Admin', 'Admin', 'Manager'])
    <a class="btn btn-sm btn-info"

       href="{{ route($routeKey.'.handshake', $row->id) }}" target="_blank">
{{--       href="{{ route($routeKey.'.dashboard', $row->id) }}" target="_blank">--}}
        Visit
    </a>
@endrole

{{--@can('dentist-list')--}}
{{--    <a class="btn btn-sm btn-info"--}}
{{--       href="{{ route($routeKey.'.patients', $row->id) }}">--}}
{{--        Visit--}}
{{--    </a>--}}
{{--@endcan--}}


