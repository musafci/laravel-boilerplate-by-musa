<div class="row justify-content-md-center ">
    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('permission_id') ? 'has-error' : '' }}">
            <label for="permission" class="font-weight-normal">Permission<span class="text-red"> *</span></label>
            <select id="permission" name="permission_id" class="form-control" required>
                <option value="">Select Permission</option>
                @foreach ($permission_set as $key => $permission_primary)
                <option value="{{ $permission_primary['id'] }}"> {{ $permission_primary['name']}} </option>
                @endforeach
            </select>
            @if($errors->has('permission_id'))
                <span class="text-danger" role="alert">{{ $errors->first('permission_id') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
            <label for="parentId" class="font-weight-normal">Parent</label>
            <select id="parentId" name="parent_id" class="form-control">
                <option value="">Select Parent</option>
                @foreach ($main_menus as $key => $menu)
                <option value="{{ $menu['permission_id'] }}"> {{ $menu['menu_name']}} </option>
                @endforeach
            </select>
            @if($errors->has('parent_id'))
                <span class="text-danger" role="alert">{{ $errors->first('parent_id') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('menu_name') ? 'has-error' : '' }}">
            <label for="menu_name" class="font-weight-normal">Menu Name<span class="text-red"> *</span></label>
            <input class="form-control" id="menu_name" type="text" name="menu_name" value="{{ old('menu_name', isset($patient_data) ? $patient_data->menu_name : null) }}" required>
            @if($errors->has('menu_name'))
                <span class="help-block" role="alert">{{ $errors->first('menu_name') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row justify-content-md-center ">
    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('menu_url') ? 'has-error' : '' }}">
            <label for="menu_url" class="font-weight-normal">Menu URL<span class="text-red"> *</span></label>
            <input class="form-control" id="menu_url" type="text" name="menu_url" value="{{ old('menu_url', isset($patient_data) ? $patient_data->menu_url : null) }}" required>
            @if($errors->has('menu_url'))
                <span class="help-block" role="alert">{{ $errors->first('menu_url') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
            <label for="type" class="font-weight-normal">Type<span class="text-red"> *</span></label>
            <input class="form-control" id="type" type="text" name="type" value="{{ old('type', isset($patient_data) ? $patient_data->type : null) }}" required>
            @if($errors->has('type'))
                <span class="help-block" role="alert">{{ $errors->first('type') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('is_show_submenu') ? 'has-error' : '' }}">
            <label for="showSubmenu" class="font-weight-normal">Show Submenu<span class="text-red"> *</span></label>
            <select  id="showSubmenu" name="is_show_submenu" class="form-control" required>
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @if($errors->has('is_show_submenu'))
                <span class="text-danger" role="alert">{{ $errors->first('is_show_submenu') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row justify-content-md-center">
    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
            <label for="order" class="font-weight-normal">Order</label>
            <input class="form-control" id="order" type="number" name="order" value="{{ old('order', isset($patient_data) ? $patient_data->order : null) }}" >
            @if($errors->has('order'))
                <span class="help-block" role="alert">{{ $errors->first('order') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
            <label for="status" class="font-weight-normal">Status<span class="text-red"> *</span></label>
            <select id="status" name="status" class="form-control" required>
                <option value="">Select</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            @if($errors->has('status'))
                <div class="text-danger" role="alert">{{ $errors->first('status') }}</div>
            @endif
        </div>
    </div>

    <div class="col-lg-3 col-3">
        <div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
            <label for="icon" class="font-weight-normal">Icon<span class="text-red"> * Icon must be white</span></label>
            <input class="form-control" id="icon" type="file" name="icon" value="{{ old('icon', isset($patient_data) ? $patient_data->icon : null) }}" required>
            @if($errors->has('icon'))
                <span class="text-danger" role="alert">{{ $errors->first('icon') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-5 col-6">
        <a class="btn btn-default" href="{{ route('menu.index') }}">
            Back
        </a>
    </div>
    <div class="col-lg-4 col-6">
        <div class="form-group ">
            <button class="btn btn-danger float-right" type="submit">
                Save
            </button>
        </div>
    </div>

</div>
