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
                                Ticket
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('ticket.index') }}">
                                    <button type="button" class="btn btn-primary position-relative">
                                        Ticket Lists
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="TicketList" class=" table table-bordered table-striped table-hover" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Issuer Name</th>
                                        <th>Priority</th>
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
        var dataTable = $('#TicketList').dataTable({
            "bProcessing": true,
            "serverSide": true,
            "order": [[0, "desc"]],
            "responsive": true,
            "scrollX": true,
            // "scrollY": "50vh",
            "scrollCollapse": true,
            "ajax": "{{route('assigned-tickets.index')}}",
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
                {'data': 'ticket.title'},
                {'data': 'ticket.description'},
                {'data': 'ticket.issuer_name'},
                {'data': 'priority'},
                {'data': 'status'},
                {'data': 'actions'}

            ]
        });
        $( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
            if (thrownError == "Unauthorized") {
                location.reload();
            }
        });

    </script>
@endsection
