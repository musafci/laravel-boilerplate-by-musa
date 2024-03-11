<div class="form-group {{ $errors->has('version_number') ? 'has-error' : '' }}">
    <label for="version_number">Version <span class="text-red"> *</span></label>
    <input class="form-control" type="text" name="version_number" value="{{ old('version_number', isset($version) ? $version->version_number : null) }}" required>
    @if($errors->has('version_number'))
        <span class="help-block" role="alert">{{ $errors->first('version_number') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status">Status <span class="text-red"> *</span></label>
    <select id="status" name="status" class="form-control" required>
        <option value="">Select</option>
        <option value="Active" @if(isset($version->status) && $version->status == 'Active') selected @endif>Active</option>
        <option value="Inactive" @if(isset($version->status) && $version->status == 'Inactive') selected @endif>Inactive</option>
    </select>
    @if($errors->has('status'))
        <span class="text-danger" role="alert">{{ $errors->first('status') }}</span>
    @endif
</div>