<div class="form-group {{ $errors->has('office_name') ? 'has-error' : '' }}">
    <label for="name">Dentist Office Name</label>
    <input class="form-control" type="text" name="office_name" value="{{ old('office_name', isset($dentist_office) ? $dentist_office->office_name : null) }}" required>
    @if($errors->has('office_name'))
        <span class="help-block" role="alert">{{ $errors->first('office_name') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">In-charge Name</label>
    <input class="form-control" type="text" name="name" value="{{ old('name', isset($office_credential) ? $office_credential->name : null) }}" required>
    @if($errors->has('name'))
        <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
    @endif
</div>

{{--<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">--}}
{{--    <label for="name">Person Email</label>--}}
{{--    <input class="form-control" type="email" name="email" value="{{ old('email', isset($office_credential) ? $office_credential->email : null) }}" required>--}}
{{--    @if($errors->has('email'))--}}
{{--        <span class="help-block" role="alert">{{ $errors->first('email') }}</span>--}}
{{--    @endif--}}
{{--</div>--}}
