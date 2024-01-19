
{{--<a class="btn btn-sm btn-info"--}}
{{--   href="{{ route($routeKey.'.patient-view', ['office' => $row['dentist_office_profile']['id'], 'patient' => $row['id']]) }}">--}}
{{--    View--}}
{{--</a>--}}
{{--&nbsp;--}}
{{--<a class="btn btn-sm btn-info"--}}
{{--   href="#">--}}
{{--    Edit--}}
{{--</a>--}}
{{--&nbsp;--}}
@role(['Super Admin', 'Admin'])
<div id="contact">
    <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#contact-modal">Change password</button>
</div>
@endrole


<div id="contact-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
{{--                <a class="close" data-dismiss="modal">×</a>--}}
                <h5>Change password for <b>{{ $row['first_name'] . " " . $row['last_name'] }}</b></h5>
            </div>
            <form id="contactForm" name="contact" role="form" action="{{route('dentist-office.staffs.change-password', ['office' => $row['dentist_office_id'], 'staff' => $row['user_id']])}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$row['email'] ?? null}}" disabled>
                        <input type="hidden" name="id" value="{{ $row['user_id'] }}">
                        <input type="hidden" name="do_id" value="{{ $row['dentist_office_id'] }}">

                    </div>
                    <div class="form-group">
                        <label for="message">New password</label>
                        <input id="passwordSignUp" type="password" name="password" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="message">Confirm password</label>
                        <input id="confirmPasswordSignUp" type="password" name="current_password" class="form-control" >
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
    const password = document.getElementById("passwordSignUp");
    const confirm_password = document.getElementById("confirmPasswordSignUp");

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
