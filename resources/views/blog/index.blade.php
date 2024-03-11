@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-confirm.min.css')}}">
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div>
                @if($errors->any())
                    <div class="col-12">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </div>
            <div class="row">
                <section class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Blog
                            </h3>
                            {{-- @can('category-create') --}}
                                <div class="card-tools">
                                    <a class="btn btn-sm btn-success" href="{{ route("blog.create") }}">
                                        Add New Blog
                                    </a>
                                </div>
                            {{-- @endcan --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="BlogList" class="table table-bordered table-striped table-hover list-data-view" style="width: 100%">
                                    <thead>
                                        <tr class="table-head-color">
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Image</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-confirm.min.js') }}" type="text/javascript"></script>
    <script>
        var dataTable = $('#BlogList').dataTable({
            "bProcessing": true,
            "serverSide": true,
            "order": [[0, "desc"]],
            "responsive": true,
            "scrollX": true,
            // "scrollY": "50vh",
            "scrollCollapse": true,
            "ajax": "{{route('blog.index')}}",
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                    "searchable": false,
                },
            ],
            'columns': [
                {
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {'data': 'category_id'},
                {'data': 'title'},
                {'data': 'body'},
                {'data': 'image'},
                {'data': 'created_by'},
                {'data': 'status'},
                {'data': 'actions'},
            ]
        });
        $( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
            if (thrownError == "Unauthorized") {
                location.reload();
            }
        });


        // Blog Delete
        $(document).on('click', '.delete-blog', function () {
            let requestData = {
                _token: $('input[name=_token]').val(),
                id: $(this).data("id"),
            }
            $.confirm({
                title: 'Confirm!',
                content: 'Warning! Deleted items can not be recovered.',
                columnClass: 'medium',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    delete: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function () {
                            $.ajax({
                                type: 'delete',
                                url: '{{ route("blog.destroy") }}',
                                data: requestData,
                                success: function (responseData) {
                                    if (responseData.status === 'success') {
                                        toastr.success(responseData.msg);
                                        location.reload();
                                    } else if (responseData.status === 'error') {
                                        toastr.error(responseData.msg);
                                    }
                                },
                                error: function () {
                                    toastr.error('Operation failed!');
                                }
                            });
                        }
                    },
                    cancel: function () {
                    }
                }
            });
        });
    </script>
@endsection
