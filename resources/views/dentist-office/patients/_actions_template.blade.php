
<a class="btn btn-sm btn-info"
   href="{{ route($routeKey.'.patient-view', ['office' => $row['dentist_office_profile']['id'], 'patient' => $row['id']]) }}">
    View
</a>
&nbsp;
@role(['Super Admin', 'Admin', 'Manager'])
    <a class="btn btn-sm btn-info"
       href="{{ route($routeKey.'.patient-edit', ['office' => $row['dentist_office_profile']['id'], 'patient' => $row['id']]) }}">
        Edit
    </a>
@endrole

