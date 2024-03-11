<div class="row justify-content-md-center ">

    <div class="col-lg-4 col-4">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="title" class="font-weight-normal">Title<span class="text-red"> *</span></label>
            <input class="form-control" id="title" type="text" name="title" value="{{ old('title', isset($blog) ? $blog->title : null) }}">
            @if($errors->has('title'))
                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <div class="form-group">
            <label for="category_id" class="font-weight-normal">Category<span class="text-red"> *</span></label>
            <select id="category_id" name="category_id" class="form-control">
                <option>Select Category</option>
                @if($categories)
                    @foreach($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>

<div class="row justify-content-md-center ">

    <div class="col-lg-8 col-8">
        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
            <label for="title" class="font-weight-normal">Body<span class="text-red"> *</span></label>
            <textarea class="form-control" cols="5" rows="5"></textarea>
            @if($errors->has('body'))
                <span class="help-block" role="alert">{{ $errors->first('body') }}</span>
            @endif
        </div>
    </div>

</div>


<div class="row justify-content-md-center">
    <div class="col-lg-4 col-4">
        <div class="form-group">
            <label for="image" class="font-weight-normal">Image<span class="text-red"> *</span> <span class="text-gray">(512 x 512)</span></label>
            <input class="form-control" id="image" type="file" name="image" value="{{ old('image', isset($blog) ? $blog->image : null) }}">
        </div>
    </div>

    <div class="col-lg-4 col-4">
        <div class="form-group">
            <label for="status" class="font-weight-normal">Status<span class="text-red"> *</span></label>
            <select id="status" name="status" class="form-control">
                <option value="">Select Status</option>
                <option value="Publish">Publish</option>
                <option value="Unpublish">Unpublish</option>
            </select>
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
