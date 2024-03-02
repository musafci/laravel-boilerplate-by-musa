<div class="row justify-content-md-center ">

    <div class="col-lg-4 col-4">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="title" class="font-weight-normal">Title<span class="text-red"> *</span></label>
            <input class="form-control" id="title" type="text" name="title" value="{{ old('title', isset($blog) ? $blog->title : null) }}" required>
            @if($errors->has('title'))
                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <div class="form-group">
            <label for="isParent" class="font-weight-normal">Does this category have a parent?</label>
            <select  id="isParent" name="is_parent" class="form-control">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
    </div>
</div>


<div class="row justify-content-md-center ">
    <div class="col-lg-8 col-8">
        <div class="form-group">
            <label for="parentId" class="font-weight-normal">Parent Category Name</label>
            <select id="parentId" name="parent_id" class="form-control">
                <option value="">Select Parent</option>
            </select>
        </div>
    </div>
</div>


<div class="row justify-content-md-center">
    <div class="col-lg-4 col-4">
        <div class="form-group">
            <label for="icon" class="font-weight-normal">Icon <span class="text-gray">(32 x 32)</span></label>
            <input class="form-control" id="icon" type="file" name="icon" value="{{ old('icon', isset($category) ? $category->icon : null) }}">
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <div class="form-group">
            <label for="banner" class="font-weight-normal">Banner <span class="text-gray">(100 x 800)</span></label>
            <input class="form-control" id="banner" type="file" name="banner" value="{{ old('banner', isset($category) ? $category->banner : null) }}">
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-4 col-4">
        <a class="btn btn-default" href="{{ route('blog.index') }}">
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
