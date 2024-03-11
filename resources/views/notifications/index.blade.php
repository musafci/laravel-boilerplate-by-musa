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
                                Notifications Panel
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="UserList" class=" table table-bordered table-striped table-hover list-data-view" style="width: 100%">
                                    <thead>
                                        <tr class="table-head-color">
                                            <th>Id</th>
                                            <th>User</th>
                                            <th>Type</th>
                                            <th>Subject</th>
                                            <th>Message</th>
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
            // "sDom": 'flipt',//'RfliptrT',
            "bProcessing": true,
            "serverSide": true,
            "order": [[0, "desc"]],
            "responsive": true,
            "scrollX": true,
            "searching": true,
            // "scrollY": "50vh",
            "scrollCollapse": true,
            "ajax": "{{route('view.notifications')}}",
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
                {'data': 'name'},
                {'data': 'type'},
                {'data': 'subject'},
                {'data': 'message'},

            ]
        });
        $( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
            if (thrownError == "Unauthorized") {
                location.reload();
            }
        });

    </script>
@endsection
