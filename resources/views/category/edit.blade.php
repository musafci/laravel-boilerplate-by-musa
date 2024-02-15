@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit category</h3>
            </div>
            <div class="card-body">

                <form method="post" action="{{route('category.update', [$category->id])}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="control-label">Name</label>
                        <input type="text" value="{{$category->name}}" class="form-control"
                               placeholder="Category Name"  name="name" autocomplete="name" required>

                        @if($errors->has('name'))
                            <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('is_parent') ? 'has-error' : '' }}">
                        <label class="control-label">Is this category a parent?</label>
                        <select name="is_parent" class="form-control" required>
                            <option value="">Select</option>
                            <option value="1" {{ ( $category->is_parent ?? '') == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ ( $category->is_parent ?? '') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                        @if($errors->has('is_parent'))
                            <span class="help-block" role="alert">{{ $errors->first('is_parent') }}</span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                        <label class="control-label">Category</label>
                        <select name="parent_id" class="form-control" required>
                            <option value="">Select Category</option>
                            <?php
                                foreach ($categories as $categoryList) {
                                    $selected = ($categoryList['id'] == $category['parent_id']) ? 'selected' : '';
                                    echo '<option value="' . $categoryList['id'] . '" ' . $selected . '>' . $categoryList['name'] . '</option>';
                                }
                            ?>
                        </select>
                        @if($errors->has('parent_id'))
                            <span class="help-block" role="alert">{{ $errors->first('parent_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('icon') ? 'has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-8">
                                <label class="control-label">Icon</label>
                                <input type="file" name="icon" value="{{old('icon')}}"
                                       class="form-control" autocomplete="icon">

                                @if($errors->has('icon'))
                                    <span class="help-block" role="alert">{{ $errors->first('icon') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset($category->icon ?? 'images/not_found.png')}}" height="100px" width="100px" alt="icon">
                            </div>
                        </div>
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('banner') ? 'has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-8">
                                <label class="control-label">Banner</label>
                                <input type="file" name="banner" value="{{old('banner')}}"
                                       class="form-control" autocomplete="banner">

                                @if($errors->has('banner'))
                                    <span class="help-block" role="alert">{{ $errors->first('banner') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset($category->banner ?? 'images/not_found.png')}}" height="150" width="100%" alt="banner">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-danger float-right" type="submit">
                            Update
                        </button>
                        <a class="btn btn-default" href="{{ route('category.index') }}">
                            Back
                        </a>
                    </div>

                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        toggleParentCategory();

        $('select[name="is_parent"]').on('change', function () {
            toggleParentCategory();
        });

        function toggleParentCategory() {
            var isParentSelected = $('select[name="is_parent"]').val() == '1';
            var parentSelect = $('select[name="parent_id"]');
            var parentFormGroup = parentSelect.closest('.form-group');

            if (isParentSelected) {
                parentFormGroup.show();
                parentSelect.prop('required', true);

                // Fetch parent categories via AJAX only if it's not in edit mode
                // if (!$editMode) {
                    // $.ajax({
                    //     url: 'get_parents.php', // Update with the actual path to your PHP script
                    //     type: 'GET',
                    //     dataType: 'json',
                    //     success: function (data) {
                    //         // Clear existing options
                    //         parentSelect.find('option').not(':first').remove();

                    //         // Populate options with fetched data
                    //         $.each(data, function (index, category) {
                    //             parentSelect.append('<option value="' + category.id + '">' + category.name + '</option>');
                    //         });
                    //     },
                    //     error: function () {
                    //         console.log('Error fetching parent categories');
                    //     }
                    // });
                // }
            } else {
                parentFormGroup.hide();
                parentSelect.prop('required', false);
            }
        }
    });
</script>
{{-- <script>
    $(document).ready(function () {
        toggleParentCategory();

        $('select[name="is_parent"]').on('change', function () {
            toggleParentCategory();
        });

        function toggleParentCategory() {
            var isParentSelected = $('select[name="is_parent"]').val() == '1';
            var parentSelect = $('select[name="parent_id"]');
            var parentFormGroup = parentSelect.closest('.form-group');

            if (isParentSelected) {
                parentFormGroup.show();
                parentSelect.prop('required', true);

                $.ajax({
                    url: "{{ route("category.list") }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        parentSelect.find('option').not(':first').remove();
                        $.each(data, function (index, category) {
                            parentSelect.append('<option value="' + category.id + '">' + category.name + '</option>');
                        });
                    },
                    error: function () {
                        console.log('Error fetching parent categories');
                    }
                });
            } else {
                parentFormGroup.hide();
                parentSelect.prop('required', false);
            }
        }
    });
</script> --}}
@endsection
