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
                                <a href="{{route('assigned-tickets.index')}}">
                                    <button type="button" class="btn btn-primary position-relative">
                                        Assigned Tickets
                                        @if($assigned_tickets > 0)
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
                                                {{ $assigned_tickets }}
                                            </span>
                                        @endif
                                    </button>
                                </a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="TicketList" class="table table-bordered table-striped table-hover list-data-view" style="width: 100%">
                                    <thead>
                                    <tr class="table-head-color">
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Sender Name</th>
                                        <th>Sender Type</th>
                                        <th>Ticket Created</th>
                                        <th>Ticket Closed</th>
                                        <th>Status</th>
                                        <th>Assignee</th>
{{--                                        <th>Assignee Feedback</th>--}}
{{--                                        <th>Remark</th>--}}
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
            "ajax": "{{route('ticket.index')}}",
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
                {'data': 'title'},
                {'data': 'description'},
                {'data': 'issuer_name'},
                {'data': 'issuer_type'},
                {'data': 'ticket_raised_at'},
                {'data': 'ticket_closed_at'},
                {'data': 'status'},
                {'data': 'assignee_details.name', 'defaultContent': ''},
                // {'data': 'ticket_assignee.user_id', 'defaultContent': ''},
                // {'data': 'ticket_assignee.remark', 'defaultContent': ''},
                // {'data': 'remark'},
                {'data': 'actions'}

            ]
        });
        $( document ).ajaxError(function( event, jqxhr, settings, thrownError ) {
            if (thrownError == "Unauthorized") {
                location.reload();
            }
        });

        {{--$(document).on('click', '.delete-role', function () {--}}
        {{--    let requestData = {--}}
        {{--        _token: $('input[name=_token]').val(),--}}
        {{--        id: $(this).data("id"),--}}
        {{--    }--}}
        {{--    $.confirm({--}}
        {{--        title: 'Confirm!',--}}
        {{--        content: 'Deleted item can not be recovered!',--}}
        {{--        columnClass: 'medium',--}}
        {{--        type: 'red',--}}
        {{--        typeAnimated: true,--}}
        {{--        buttons: {--}}
        {{--            delete: {--}}
        {{--                text: 'Delete',--}}
        {{--                btnClass: 'btn-red',--}}
        {{--                action: function () {--}}
        {{--                    $.ajax({--}}
        {{--                        type: 'post',--}}
        {{--                        url: '{{ route("ticket.destroy") }}',--}}
        {{--                        data: requestData,--}}
        {{--                        success: function (responseData) {--}}
        {{--                            if (responseData.status === 'success') {--}}
        {{--                                toastr.success(responseData.msg);--}}
        {{--                                location.reload();--}}
        {{--                            } else if (responseData.status === 'error') {--}}
        {{--                                toastr.error(responseData.msg);--}}
        {{--                            }--}}
        {{--                        },--}}
        {{--                        error: function () {--}}
        {{--                            toastr.error('Operation failed!');--}}
        {{--                        }--}}
        {{--                    });--}}
        {{--                }--}}
        {{--            },--}}
        {{--            cancel: function () {--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
    </script>
@endsection
