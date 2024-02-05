@extends('layouts.admin')
@section('styles')
    <style>
        #parentCategoriesRow {
            display: none;
        }
    </style>
@endsection
@section('content')

<section class="content">

    <!-- Default box -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Show
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        Category Name
                                    </th>
                                    <td>
                                        {{ $category->name ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Has Parent
                                    </th>
                                    <td>
                                        @if($category->is_parent == 0)
                                            <span class="btn-xs btn-info">No</span>
                                        @else
                                            <span class="btn-xs btn-success">Yes</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr id="parentCategoriesRow">
                                    <th>
                                        Parent Name
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>
                                        Icon
                                    </th>
                                    <td>
                                        <img src="{{asset($category->icon ?? 'images/not_found.png')}}" height="30px" width="30px" alt="icon">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Banner
                                    </th>
                                    <td>
                                        <img src="{{asset($category->banner ?? 'images/not_found.png')}}" height="150" width="200px" alt="banner">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Created Date
                                    </th>
                                    <td>
                                        {{ isset($category->created_at) ? $category->created_at->format('j F, Y H:i:s A') : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Updated Date
                                    </th>
                                    <td>
                                        {{ isset($category->updated_at) ? $category->updated_at->format('j F, Y H:i:s A') : null }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{route('category.index')}}">
                               Back
                            </a>
                        </div>
                    </div>
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
        let isParent = {{ $category->is_parent }};

        if (isParent === 1) {
            $('#parentCategoriesRow').show();
            $.ajax({
                url: '/category-parent/' + {{ $category->parent_id }},
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#parentCategoriesRow').show();
                    let parentCategoriesContent = '';
                    parentCategoriesContent += '<span class="btn-xs btn-primary">' + data + '</span>&nbsp;';
                    $('#parentCategoriesRow td').html(parentCategoriesContent);
                },
                error: function () {
                    console.log('Error fetching parent categories');
                }
            });
        }
    });
</script>
@endsection