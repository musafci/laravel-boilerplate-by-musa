@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-confirm.min.css')}}">
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Permissions
                            </h3>
{{--                            @can('permission-create')--}}
                               <div class="card-tools">
                                   <a class="btn btn-sm btn-success" href="{{ route("permission.create") }}">
                                       Add New Permission
                                   </a>
                               </div>
{{--                            @endcan--}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="UserList" class=" table table-bordered table-striped table-hover list-data-view" style="width: 100%">
                                    <thead>
                                    <tr class="table-head-color">
                                        <th>#</th>
                                        <th>Permission Lists</th>
                                        <th>Created at</th>
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
        var dataTable = $('#UserList').dataTable({
            "bProcessing": true,
            "serverSide": true,
            "order": [[0, "asc"]],
            "responsive": true,
            "scrollX": true,
            // "scrollY": "50vh",
            "scrollCollapse": true,
            "ajax": "{{route('permission.index')}}",
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                    "searchable": false,
                },
            ],
            'columns': [
                {'data': 'id'},
                {'data': 'name'},
                {'data': 'created_at'},
                {'data': 'actions'}

            ]
        });
        $( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
            if (thrownError == "Unauthorized") {
                location.reload();
            }
        });

        $(document).on('click', '.delete-role', function () {
            let requestData = {
                _token: $('input[name=_token]').val(),
                id: $(this).data("id"),
            }
            console.log("hello",requestData);
            $.confirm({
                title: 'Confirm!',
                content: 'Deleted item can not be recovered!',
                columnClass: 'medium',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    delete: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function () {
                            $.ajax({
                                type: 'post',
                                url: '{{ route("permission.destroy") }}',
                                data: requestData,
                                success: function (responseData) {
                                    console.log("hello",responseData);
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
