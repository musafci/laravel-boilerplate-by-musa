<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">User Name</label>
    <input class="form-control" type="text" name="name" value="{{ old('name', isset($office_credential) ? $office_credential->name : null) }}" required>
    @if($errors->has('name'))
        <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="name">User Email</label>
    <input class="form-control" type="email" name="email" value="{{ old('email', isset($office_credential) ? $office_credential->email : null) }}" required>
    @if($errors->has('email'))
        <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
    @endif
</div>
<div class="form-group ">
    <label for="">User Role:</label>
    <select  id="role" name="role" class="form-control col-4">
        <option value="Admin">Admin</option>
        @foreach ($roles as $role)
            @continue($role == 'Super Admin')
            @if($role != auth()->user()->name && $role != 'Admin')
                <option value="{{$role}}"> {{$role}} </option>
            @endif
        @endforeach
    </select>
</div>
