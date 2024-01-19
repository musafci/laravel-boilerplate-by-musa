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
                            <h2>
                                Assignee Tickets
                            </h2>
                            {{--    Tab View Starts    --}}


                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active">
                                        <a href="#tab-table1" data-toggle="tab">Table 1</a>
                                    </li>
                                    <li>
                                        <a href="#tab-table2" data-toggle="tab">Table 2</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-table1">
                                        <table id="OpenTicketList" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                    <div class="tab-pane" id="tab-table2">
                                        <table id="ClosedTicketList" class="table table-striped table-bordered" cellspacing="0" width="100%">
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


                            {{--    Tab View Ends    --}}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection


{{--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>--}}

<script>

    $(document).ready(function () {
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
        });

        $('table.table').DataTable({
            ajax: 'assigned-tickets?ticket=Closed',
            scrollY: 200,
            scrollCollapse: true,
            paging: false,
        });

        // Apply a search to the second table for the demo
        $('#ClosedTicketList').DataTable().search('New York').draw();
    });


    $(document).ready(function() {
        $('#').DataTable();
    } );


</script>
