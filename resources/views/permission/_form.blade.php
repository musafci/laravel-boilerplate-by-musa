<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">Permission Name<span class="text-red"> *</span></label>
    <input class="form-control" type="text" name="name" value="{{ old('name', isset($permission) ? $permission->name : null) }}" required
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
    <select  id="guardName" name="guard_name" class="form-control" required @if(isset($breadcrumbs['0']) && $breadcrumbs['0'] == 'Edit') disabled @endif>
        <option value="">Select</option>
        <option value="sanctum">Sanctum</option>
        <option value="web">Web</option>
    </select>
    @if($errors->has('guard_name'))
        <span class="text-danger" role="alert">{{ $errors->first('guard_name') }}</span>
    @endif
</div>