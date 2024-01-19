<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">Role Name<span class="text-red"> *</span></label>
    <input class="form-control" type="text" name="name" value="{{ old('name', isset($role) ? $role->name : null) }}" required
    @if(isset($breadcrumbs['0']) && $breadcrumbs['0'] == 'Edit')
        disabled
    @endif
    >
    @if($errors->has('name'))
        <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('guard_name') ? 'has-error' : '' }}">
    <label for="guardName">Guard<span class="text-red"> *</span></label>
    <select id="guardName" name="guard_name" class="form-control" required @if(isset($breadcrumbs['0']) && $breadcrumbs['0'] == 'Edit') disabled @endif>
        <option value="">Select</option>
        <option value="sanctum" @if(isset($role->guard_name) && $role->guard_name == 'sanctum') selected @endif>Sanctum</option>
        <option value="web" @if(isset($role->guard_name) && $role->guard_name == 'web') selected @endif>Web</option>
    </select>
    @if($errors->has('guard_name'))
        <span class="text-danger" role="alert">{{ $errors->first('guard_name') }}</span>
    @endif
</div>

@if(isset($breadcrumbs['0']) && $breadcrumbs['0'] == 'Edit')
<div class="form-group {{ $errors->has('permission') ? 'has-error' : '' }}">
    <label>Permission<span class="text-red"> *</span></label>
    <select multiple name="permission[]" placeholder=" Select Permission(s) " data-allow-clear="1" required>
        @foreach($permission as $value)
            <option value="{{ $value->name }}"
                {{ in_array($value->id, $rolePermissions) ? 'selected' : '' }}
            >
                {{ $value->name }}</option>
        @endforeach
    </select>
    @if($errors->has('permission'))
        <br>
        <span class="help-block" role="alert">{{ $errors->first('permission') }}</span>
    @endif
</div>
@endif

@if(isset($breadcrumbs['0']) && $breadcrumbs['0'] == 'Create')
<div class="form-group {{ $errors->has('permission') ? 'has-error' : '' }}">
    <label>Permission<span class="text-red"> *</span></label>
    <select multiple name="permission[]" placeholder="Select Permission(s)" data-allow-clear="1" required style="width: 100%">
        <option value="">Select</option>
    </select>
    @if($errors->has('permission'))
        <br>
        <span class="help-block" role="alert">{{ $errors->first('permission') }}</span>
    @endif
</div>
@endif



@section('scripts')
<script>
    $(document).ready(function () {
        $('#guardName').change(function () {
            let guardName = $(this).val();

            $.ajax({
                url: "{{ route('guard.wise.permissions') }}",
                method: 'GET',
                data: { guard_name: guardName },
                success: function (data) {
                    let permissionsSelect = $('select[name="permission[]"]');
                    permissionsSelect.empty();

                    $.each(data, function (key, value) {
                        permissionsSelect.append('<option value="' + value.name + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection