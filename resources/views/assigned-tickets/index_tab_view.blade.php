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
                            <ul id="tabs" class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a id="tab-A" href="#pane-open-ticket" class="nav-link {{ $ticket != 'closed' ? 'active' : '' }} " data-toggle="tab" role="tab"> Open Tickets </a>
                                </li>

                                <li class="nav-item">
                                    <a id="tab-B" href="#pane-closed-ticket" class="nav-link {{ $ticket == 'closed' ? 'active' : '' }} " data-toggle="tab" role="tab"> Closed Tickets </a>
                                </li>
                            </ul>
                            <div id="content" class="tab-content" role="tablist">
                                {{--  Content of Tab A Starts  --}}
                                <div id="pane-open-ticket" class="card tab-pane fade {{ $ticket != 'closed' ? 'show active' : '' }}" role="tabpanel" aria-labelledby="tab-A">
                                    <div class="card-header" role="tab" id="heading-A">
                                        @include('assigned-tickets.index_open_tickets')
                                    </div>
                                </div>
                                {{--  Content of Tab A Ends  --}}
                                {{--  Content of Tab B Starts  --}}
                                <div id="pane-closed-ticket" class="card tab-pane fade {{ $ticket == 'closed' ? 'show active' : '' }}" role="tabpanel" aria-labelledby="tab-B">
                                    <div class="card-header" role="tab" id="heading-B">
                                        @include('assigned-tickets.index_closed_tickets')
                                    </div>
                                </div>
                                {{--  Content of Tab B Ends  --}}
                            </div>
                            {{--    Tab View Ends    --}}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.nav li a').click(function(){
            const data = $(this).attr("href");
            if (data === "#pane-open-ticket") {
                // document.getElementById('pane-closed-ticket').hidden=true;
                document.querySelector('#ClosedTicketList').style.display = 'none';
            }
            if (data === "#pane-closed-ticket") {
                // document.getElementById('pane-open-ticket').hidden=true;
                document.querySelector('#OpenTicketList').style.display = 'none';
            }
            console.log(data + "{{ $ticket }}");
            const item_data = 'closed';
            if (item_data === "{{ $ticket }}") {
               if (data === "#pane-open-ticket") {
                   document.location.href = "/assigned-tickets";
               }
            } else {
                if (data === "#pane-closed-ticket") {
                    document.location.href = "/assigned-tickets?ticket=closed";
                }
            }
        });
    </script>
@endsection
