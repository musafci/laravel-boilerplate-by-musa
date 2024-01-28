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
                                        {{ $category[0]['name'] ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Has Parent
                                    </th>
                                    <td>
                                        @if($category[0]['is_parent'] == 0)
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
                                        <img src="{{asset($category[0]['icon'] ?? 'images/not_found.png')}}" height="100px" width="100px" alt="icon">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Banner
                                    </th>
                                    <td>
                                        <img src="{{asset($category[0]['banner'] ?? 'images/not_found.png')}}" height="150" width="200px" alt="banner">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Created At
                                    </th>
                                    <td>
                                        {{ isset($category[0]['created_at']) ? date('j F, Y H:i:s A', strtotime($category[0]['created_at'])) : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Updated At
                                    </th>
                                    <td>
                                        {{ isset($category[0]['updated_at']) ? date('j F, Y H:i:s A', strtotime($category[0]['updated_at'])) : null }}
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
        let isParent = {{ $category[0]['is_parent'] }};
        console.log("isParent", isParent);

        if (isParent === 1) {
            $('#parentCategoriesRow').show();
            $.ajax({
                url: '/categoryParent/' + {{ $category[0]['id'] }},
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log("data", data);
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