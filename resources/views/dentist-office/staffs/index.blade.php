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
                                Staffs of <b>{{ $dentistOffice['office_name'] ?? null }}</b>
                            </h3>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="UserList" class=" table table-bordered table-striped table-hover" style="width: 100%">
                                    <thead>
                                    <tr class="table-head-color">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Updated Date</th>
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
        var do_id = {{$dentistOffice['id'] ?? 0}};
        var dataTable = $('#UserList').dataTable({
            // "sDom": 'flipt',//'RfliptrT',
            "bProcessing": true,
            "serverSide": true,
            "order": [[0, "asc"]],
            "responsive": true,
            "scrollX": true,
            "searching": true,
            // "scrollY": "50vh",
            "scrollCollapse": true,
            "ajax": "/dentist-office/"+do_id+"/staffs",
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
                {
                    data: null,
                    render: function ( data, type, row ) {
                        // Combine the first and last names into a single table field
                        return data.first_name+' '+data.last_name;
                    },
                    editField: ['first_name', 'last_name']
                },
                {'data': 'email'},
                {'data': 'status'},
                {'data': 'created_at'},
                {'data': 'updated_at'},
                {'data': 'actions'},

            ]
        });
        $( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
            if (thrownError == "Unauthorized") {
                location.reload();
            }
        });

    </script>
@endsection
