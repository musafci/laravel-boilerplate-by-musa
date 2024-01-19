{{--<div class="card-body">--}}
    <div class="table-responsive">
        <table id="OpenTicketList" class="display table table-bordered table-striped table-hover list-data-view" style="width: 100%">
            <thead>
            <tr class="table-head-color">
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Issuer Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
{{--</div>--}}


@section('scripts')
    @parent
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-confirm.min.js') }}" type="text/javascript"></script>

    <script>

        var dataTable = $('#OpenTicketList').dataTable({
            // "dom": 'RlBfrtip',
            "bProcessing": true,
            "serverSide": true,
            "order": [[0, "desc"]],
            "responsive": true,
            "scrollX": true,
            // "scrollY": "50vh",
            "scrollCollapse": true,
            {{--"ajax": "{{route('assigned-tickets.index')}}",--}}
            "ajax": "assigned-tickets",
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
