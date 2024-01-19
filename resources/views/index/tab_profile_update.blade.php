<div class="card-body">
    <div class="form-group">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>
                    Name
                </th>
                <td>
                    {{ $user['name'] ?? null }}
                </td>
            </tr>
            <tr>
                <th>
                    Email
                </th>
                <td>
                    {{ $user['email'] ?? null }}
                </td>
            </tr>
            <tr>
                <th>
                    Created At
                </th>
                <td>
                    {{ isset($user['created_at']) ? date('j F, Y H:i:s A', strtotime($user['created_at'])) : null }}
                </td>
            </tr>
            <tr>
                <th>
                    Role
                </th>
                <td>
                    {{ $user['roles'][0]['name'] ?? null }}
                </td>
            </tr>

            </tbody>
        </table>
        <div class="form-group">
            <a class="btn btn-default" href="{{route('user.index')}}">
                Back
            </a>
        </div>
    </div>
</div>
