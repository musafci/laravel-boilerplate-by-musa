@can('user-show')
    @if ( isset($row->roles[0]->name) && $row->roles[0]->name != 'Admin' )
        <a class="btn btn-sm btn-info"
           href="{{ route($routeKey.'.show', $row->id) }}">
            View
        </a>
    @endif
@endcan
&nbsp;
@role(['Super Admin', 'Admin'])
    @can('user-delete')
        @if( isset($row->roles[0]->name) && $row->roles[0]->name != 'Admin')
            <a class="btn btn-sm btn-danger delete-role"
               href="javascript:;;" data-id="{{ $row->id }}">
                Delete
            </a>
        @endif
    @endcan
@endrole

@if($row->id === \Illuminate\Support\Facades\Auth::user()->id)
    <div id="contact">
        <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#user-modal">Change password</button>
    </div>

<div id="user-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{--                <a class="close" data-dismiss="modal">×</a>--}}
                <h5>Change your password </h5>
            </div>
            <form id="contactForm" name="contact" role="form" action="{{route('user.change-password', $row->id)}}" method="POST">
{{--            <form id="contactForm" name="contact" role="form" action="#" method="POST">--}}
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$row['email'] ?? null}}" disabled>
                        <input type="hidden" name="id" value="{{ $row->id }}">

                    </div>
                    <div class="form-group">
                        <label for="message">Current Password</label>
                        <input id="oldPassword" type="password" name="current_password" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="message">New password</label>
                        <input id="newPassword" type="password" name="new_password" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="message">Confirm password</label>
                        <input id="confirmNewPassword" type="password" name="confirm_password" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" id="submit">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#contactForm").submit(function(event){
            submitForm();
            return false;
        });
    });

</script>


<script>
    const oldPassword = document.getElementById("oldPassword");
    const password = document.getElementById("newPassword");
    const confirm_password = document.getElementById("confirmNewPassword");

    function validatePassword(){
        if(password.value !== confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

@endif
