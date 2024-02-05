<div class="row justify-content-md-center ">

    <div class="col-lg-4 col-4">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name" class="font-weight-normal">Category Name<span class="text-red"> *</span></label>
            <input class="form-control" id="name" type="text" name="name" value="{{ old('name', isset($category) ? $category->name : null) }}">
            @if($errors->has('name'))
                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <div class="form-group {{ $errors->has('is_parent') ? 'has-error' : '' }}">
            <label for="isParent" class="font-weight-normal">Does this category have a parent?<span class="text-red"> *</span></label>
            <select  id="isParent" name="is_parent" class="form-control">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @if($errors->has('is_parent'))
                <span class="text-danger" role="alert">{{ $errors->first('is_parent') }}</span>
            @endif
        </div>
    </div>
</div>


<div class="row justify-content-md-center ">
    <div class="col-lg-8 col-8">
        <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
            <label for="parentId" class="font-weight-normal">Parent Category Name<span class="text-red"> *</span></label>
            <select id="parentId" name="parent_id" class="form-control">
                <option value="">Select Parent</option>
            </select>
            @if($errors->has('parent_id'))
                <span class="text-danger" role="alert">{{ $errors->first('parent_id') }}</span>
            @endif
        </div>
    </div>
    
</div>


<div class="row justify-content-md-center">
    <div class="col-lg-4 col-4">
        <div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
            <label for="icon" class="font-weight-normal">Icon<span class="text-red"> * Icon must be white</span></label>
            <input class="form-control" id="icon" type="file" name="icon" value="{{ old('icon', isset($category) ? $category->icon : null) }}">
            @if($errors->has('icon'))
                <span class="text-danger" role="alert">{{ $errors->first('icon') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
            <label for="banner" class="font-weight-normal">Banner<span class="text-red"> * Banner must be white</span></label>
            <input class="form-control" id="banner" type="file" name="banner" value="{{ old('banner', isset($category) ? $category->banner : null) }}">
            @if($errors->has('banner'))
                <span class="text-danger" role="alert">{{ $errors->first('banner') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-4 col-4">
        <a class="btn btn-default" href="{{ route('category.index') }}">
            Back
        </a>
    </div>
    <div class="col-lg-4 col-4">
        <div class="form-group ">
            <button class="btn btn-danger float-right" type="submit">
                Save
            </button>
        </div>
    </div>

</div>
