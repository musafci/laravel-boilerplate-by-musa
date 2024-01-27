@extends('layouts.admin')
@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="row ">
            {{--            <div class="col-lg-3"></div>--}}

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Category
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("category.store") }}" enctype="multipart/form-data">
                            @csrf
                            @include(('category._form_create'))
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
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
</script>
@endsection
